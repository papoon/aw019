<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use FeedReader;
use DB;

class RssFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rssfeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vai buscar a todos os feeds que adicionamos no projecto, as noticias relaciondas com o euro2016';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Este metodo vai ser chamado sempre que executamos o script

        
        $keywordsToSearch = ['euro 2016','campeonato da europa','europeu'];

        $feedsSource = DB::select('select * from feeds');

        

        foreach ($feedsSource as $key => $feedSource) {

            $feed = FeedReader::read($feedSource->url_feed);

            $feeds = $feed->get_items();

            foreach ($feeds as $key => $itemFeed) {

                $feedNewsNumber = DB::select('select count(*) as number from feed_news where title = :title and date_pub = :date_pub',
                                                    ['title' => $itemFeed->get_title(),
                                                    'date_pub' => $itemFeed->get_date('Y-m-d H:i:s')]

                );
                
                if($feedNewsNumber[0]->number > 0){
                    continue;
                }

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $itemFeed->get_link());
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

                $pagina = utf8_decode(curl_exec($ch));
                

                $resposta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                if ($resposta == '404') {
                   continue;
                }

                curl_close($ch);


                $doc = new \DOMDocument();

                @$doc->loadHTML($pagina);

                $nodesTitle = $doc->getElementsByTagName('title');

                $article = $doc->getElementsByTagName('article');

                if ($article && 0<$article->length ) {

                    $article = $article->item(0);

                    $script = $article->getElementsByTagName('script');

                    $remove = [];

                    foreach($script as $item)
                    {
                        $remove[] = $item;
                    }

                    foreach ($remove as $item)
                    {
                        $item->parentNode->removeChild($item); 
                    }
                       
                    $articleContent = strtolower(strip_tags($doc->savehtml($article)));
                }
                    
                    
                    //get and display what you need:
                $title = $nodesTitle->item(0)->nodeValue;
                    
                $metas = $doc->getElementsByTagName('meta');

                for ($i = 0; $i < $metas->length; $i++)
                {
                    $meta = $metas->item($i);
                    if($meta->getAttribute('name') == 'description')
                        $description = $meta->getAttribute('content');
                    if($meta->getAttribute('name') == 'keywords')
                        $keywords = strtolower($meta->getAttribute('content'));
                }

                foreach ($keywordsToSearch as $key => $value) {

                    if (strpos($keywords, $value) !== false || strpos($articleContent, $value)!== false) {
                        $isPageAboutEuro =  TRUE;
                        break;
                    }
                    else{
                        $isPageAboutEuro = FALSE;
                    }
                        
                }
                
                if($isPageAboutEuro){

                    //echo $itemFeed->get_link().PHP_EOL;
                    //echo $itemFeed->get_image_url().PHP_EOL;
                    //echo $itemFeed->get_image_link().PHP_EOL;
                    //echo $itemFeed->get_image_title().PHP_EOL;
                    //echo $itemFeed->get_description().PHP_EOL;
                    //echo $itemFeed->get_author().PHP_EOL;
                    //echo $itemFeed->get_title().PHP_EOL;
                    //echo $itemFeed->get_date('Y-m-d H:i:s').PHP_EOL;

                    @$doc->loadHTML($itemFeed->get_description());
                    $img = $doc->getElementsByTagName('img');
                    $srcImg = ($img->length == 0) ? null : $img->item(0)->getAttribute('src');
                    

                    DB::insert('insert into feed_news (title,description,link,artigo,img_link,source,date_pub) 
                        values (?,?,?,?,?,?,?)',
                                            [
                                                $itemFeed->get_title(),
                                                preg_replace("/<img[^>]+\>/i", "", $itemFeed->get_description()),
                                                $itemFeed->get_link(),
                                                $articleContent,
                                                $srcImg,
                                                $feedSource->fonte_feed,
                                                $itemFeed->get_date('Y-m-d H:i:s')
                                            ]);
                }
            } 
        }
    }
}
