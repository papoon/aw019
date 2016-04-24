<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use DB;

class Wiki extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wiki';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wiki scrapper';

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

        $url = "http://pt.wikipedia.org/wiki/Campeonato_Europeu_de_Futebol_de_2016";
        
        $client = new Client();
        $crawler = $client->request('GET', $url);
        

        $conteudoPagina = $crawler->filter('body > div[id="content"] > div[id="bodyContent"] > div[id="mw-content-text"]');

        //var_dump($conteudoPagina);

        $tabelaPaisesQualificados = $conteudoPagina->filter('table')->eq(4);
        //var_dump($tabela);

        $paises = $tabelaPaisesQualificados->filter('tr > td:first-child > a:last-child')->each(function($node,$i){
            
            return $node;
        });

        //lista com os paises a participar no euro
        $listaPaisesEuro = array();
        foreach ($paises as $key => $value) {
            $listaPaisesEuro[] = $value->text();
        }
        //var_dump($listaPaisesEuro);
        //
        
        $tabelaArbitos = $conteudoPagina->filter('table')->eq(6);
        //var_dump($tabelaArbitos->html());
        //
        $arbitos = $tabelaArbitos->filter('tr > td')->each(function($node,$i){
            return $node;
        });

        $listaArbitos = array();
        $arbitoPais = array();
        for ($i=1; $i < count($arbitos)+1; $i++) {

            $arbitoPais[] = $arbitos[$i-1]->text();
            if($i%2==0){
                $listaArbitos[] = $arbitoPais;
                unset($arbitoPais);
            }
        }

        //var_dump($listaArbitos);

        /////////////////////////////////////////////////////////////////////////////
        // Estadios
        $tabelaEstadios = $conteudoPagina->filter('table')->eq(7);
        //var_dump($tabelaEstadios);
        //
        //
        $estadios = $tabelaEstadios->filter('tr > th,td')->each(function($node,$i){
            return $node;
            if($i == 5){
                break;
            }
        });
        //var_dump($estadios[32]);

        $listaEstadios = array();
        $estadioInfo = array();
        $colunaCompleta = 0;
        $numeroCol = 4;
        $numeroLine = 0;
        for ($i=1; $i < 24; $i++) {
            //hack
            
            $estadioInfo[] = ($numeroLine == 4 ? $estadios[$i-1]->html() : $estadios[$i-1]->text());
            if($i%$numeroCol==0){
                
                $listaEstadios[] = $estadioInfo;
                unset($estadioInfo);
                $colunaCompleta++;
                $numeroLine++;
            }
            if($colunaCompleta == 5){
                //$i = $i + ($numeroCol == 4 ? 3 : 2);
                $colunaCompleta = 0;
                //$numeroCol = ($numeroCol == 4 ? 2 : 4);
                $numeroLine = 0;
            }
            
        }
        


        $listaEstadios2 = array();
        $estadioInfo = array();
        $colunaCompleta = 0;
        $numeroCol = 2;
        $numeroLine = 0;
        for ($i=23; $i < count($estadios)-22; $i++) {
            //hack
            
            $estadioInfo[] = ($numeroLine == 4 ? $estadios[$i]->html() : $estadios[$i]->text());
            if($i%$numeroCol ==0){
                
                $listaEstadios2[] = $estadioInfo;
                unset($estadioInfo);
                $colunaCompleta++;
                $numeroLine++;
            }
            if($colunaCompleta == 5){
                //$i = $i + ($numeroCol == 4 ? 3 : 2);
                $colunaCompleta = 0;
                //$numeroCol = ($numeroCol == 4 ? 2 : 4);
                $numeroLine = 0;
            }
            
        }

        //var_dump($listaEstadios2);

        $listaEstadios3 = array();
        $estadioInfo = array();
        $colunaCompleta = 0;
        $numeroCol = 4;
        $numeroLine = 0;
        for ($i=35; $i < count($estadios); $i++) {
            //hack
            
            $estadioInfo[] = ($numeroLine == 4 ? $estadios[$i]->html() : $estadios[$i]->text());
            if(($i-2)%$numeroCol ==0){
                //echo $i.PHP_EOL;
                $listaEstadios3[] = $estadioInfo;
                unset($estadioInfo);
                $colunaCompleta++;
                $numeroLine++;
            }
            if($colunaCompleta == 5){
                //$i = $i + ($numeroCol == 4 ? 3 : 2);
                $colunaCompleta = 0;
                //$numeroCol = ($numeroCol == 4 ? 2 : 4);
                $numeroLine = 0;
            }
            
        }


        $listaEstadiosGeral = array();
        $listaEstadiosOrg = array();
        //var_dump($listaEstadios3);
        
        for ($i=0; $i < count($listaEstadios); $i++) {
            foreach ($listaEstadios[$i] as $key => $value) {
                $listaEstadiosGeral[$i][] = $value;
            }
        }
        
        for ($i=0; $i < count($listaEstadios2); $i++) {
            foreach ($listaEstadios2[$i] as $key => $value) {
                $listaEstadiosGeral[$i][] = $value;
            }
        }
        
        for ($i=0; $i < count($listaEstadios3); $i++) {
            foreach ($listaEstadios3[$i] as $key => $value) {
                $listaEstadiosGeral[$i][] = $value;

            }
        }

        for ($i=0; $i < count($listaEstadiosGeral); $i++) {
            $j=0;
            foreach ($listaEstadiosGeral[$i] as $key => $value) {
                $listaEstadiosOrg[$j][] = $value;
                $j++;
            }
        }


        //var_dump($listaEstadiosOrg);
        
        $queryEstadios = "INSERT INTO `aw019`.`estadios`
                        (
                        `estadio`,
                        `cidade`,
                        `capacidade`,
                        `cordenadas`,
                        `imagem_link`
                        )
                        ";

        $values = "VALUES";
        foreach ($listaEstadiosOrg as $key => $value) {
            $values.="
                        (
                        '".$value[1]."',
                        '".$value[0]."',
                        '".$value[3]."',
                        '".$value[2]."',
                        '".$value[4]."'
                        ),";
        }
        $values = rtrim($values,',');

        //DB::insert($queryEstadios.$values);
        echo $queryEstadios.$values;
        //echo $link;


        //Fim estádios

        ///////////////////////////////////////////////////////////////////////////////
        //
        /*
        $tabelaGrupoA = $conteudoPagina->filter('table')->eq(11);
        //var_dump($tabelaGrupoA->html());

        $tabelaGrupoAPrimeiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(12);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoAPrimeiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoAPrimeiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(13);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoAPrimeiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoASegundaJornadaJogo1 = $conteudoPagina->filter('table')->eq(14);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoASegundaJornadaJogo1->html()).'</table>');
        $tabelaGrupoASegundaJornadaJogo2 = $conteudoPagina->filter('table')->eq(15);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoASegundaJornadaJogo2->html()).'</table>');


        $tabelaGrupoATerceiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(16);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoATerceiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoATerceiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(17);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoATerceiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoB = $conteudoPagina->filter('table')->eq(18);
        //var_dump($tabelaGrupoA->html());

        $tabelaGrupoBPrimeiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(19);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoBPrimeiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoBPrimeiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(20);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoBPrimeiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoBSegundaJornadaJogo1 = $conteudoPagina->filter('table')->eq(21);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoBSegundaJornadaJogo1->html()).'</table>');
        $tabelaGrupoBSegundaJornadaJogo2 = $conteudoPagina->filter('table')->eq(22);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoBSegundaJornadaJogo2->html()).'</table>');


        $tabelaGrupoBTerceiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(23);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoBTerceiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoBTerceiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(24);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoBTerceiraJornadaJogo2->html()).'</table>');


        $tabelaGrupoC = $conteudoPagina->filter('table')->eq(25);
        //var_dump($tabelaGrupoA->html());

        $tabelaGrupoCPrimeiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(26);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoCPrimeiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoCPrimeiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(27);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoCPrimeiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoCSegundaJornadaJogo1 = $conteudoPagina->filter('table')->eq(28);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoCSegundaJornadaJogo1->html()).'</table>');
        $tabelaGrupoCSegundaJornadaJogo2 = $conteudoPagina->filter('table')->eq(29);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoCSegundaJornadaJogo2->html()).'</table>');


        $tabelaGrupoCTerceiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(30);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoCTerceiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoCTerceiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(31);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoCTerceiraJornadaJogo2->html()).'</table>');
        

        $tabelaGrupoD = $conteudoPagina->filter('table')->eq(32);
        //var_dump($tabelaGrupoA->html());

        $tabelaGrupoDPrimeiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(33);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoDPrimeiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoDPrimeiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(34);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoDPrimeiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoDSegundaJornadaJogo1 = $conteudoPagina->filter('table')->eq(35);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoDSegundaJornadaJogo1->html()).'</table>');
        $tabelaGrupoDSegundaJornadaJogo2 = $conteudoPagina->filter('table')->eq(36);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoDSegundaJornadaJogo2->html()).'</table>');


        $tabelaGrupoDTerceiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(37);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoDTerceiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoDTerceiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(38);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoDTerceiraJornadaJogo2->html()).'</table>');


        $tabelaGrupoE = $conteudoPagina->filter('table')->eq(39);
        //var_dump($tabelaGrupoA->html());

        $tabelaGrupoEPrimeiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(40);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoEPrimeiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoEPrimeiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(41);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoEPrimeiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoESegundaJornadaJogo1 = $conteudoPagina->filter('table')->eq(42);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoESegundaJornadaJogo1->html()).'</table>');
        $tabelaGrupoESegundaJornadaJogo2 = $conteudoPagina->filter('table')->eq(43);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoESegundaJornadaJogo2->html()).'</table>');


        $tabelaGrupoETerceiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(44);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoETerceiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoETerceiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(45);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoETerceiraJornadaJogo2->html()).'</table>');


        $tabelaGrupoF = $conteudoPagina->filter('table')->eq(46);
        //var_dump($tabelaGrupoA->html());

        $tabelaGrupoFPrimeiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(47);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoFPrimeiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoFPrimeiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(48);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoFPrimeiraJornadaJogo2->html()).'</table>');



        $tabelaGrupoFSegundaJornadaJogo1 = $conteudoPagina->filter('table')->eq(49);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoFSegundaJornadaJogo1->html()).'</table>');
        $tabelaGrupoFSegundaJornadaJogo2 = $conteudoPagina->filter('table')->eq(50);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoFSegundaJornadaJogo2->html()).'</table>');


        $tabelaGrupoFTerceiraJornadaJogo1 = $conteudoPagina->filter('table')->eq(51);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoFTerceiraJornadaJogo1->html()).'</table>');
        $tabelaGrupoFTerceiraJornadaJogo2 = $conteudoPagina->filter('table')->eq(52);
        var_dump('<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $tabelaGrupoFTerceiraJornadaJogo2->html()).'</table>');

        */
        //$esquemaEliminatorias = $conteudoPagina->filter('table')->eq(55);
        //$esquemaEliminatoriasHtml = '<table>'.preg_replace('/(<[^>]+) style=".*?"/i', '$1', $esquemaEliminatorias->html()).'</table>';
        
        /*
        $eliminatoriasTexto = $conteudoPagina->filterXPath('..span[@id="Eliminat.C3.B3rias"]/
    preceding-sibling::h3[@id="Equipas_classificadas"][1]/
        preceding-sibling::p[
            preceding-sibling::..span[@id="Eliminat.C3.B3rias"]
        ]')->each(function($node,$i){
            
            return $node;
        });

        var_dump($eliminatoriasTexto);
        */
       
        /*
        $eliminatoriasTexto = $conteudoPagina->filterXPath('//h2/span[@id="Eliminat.C3.B3rias"]/../following-sibling::*[self::p or self::h2 or self::h3][count(.|//*[@id="Equipas_classificadas"]/..) = count(//*[@id="Equipas_classificadas"]/..)]')->each(function($node,$i){

            return [$node,$node->nodeName()];
        });*/
        
        //$eliminatoriasTexto = $conteudoPagina->filterXPath('//*[@id="mw-content-text"]/*/following-sibling::*[self::p or self::h2 or self::h3]')->each(function($node,$i){

            //return [$node,$node->nodeName()];
        //});

        
        /*
        $eliminatoriasTexto = $conteudoPagina->filterXPath('//h2/span[@id="Eliminat.C3.B3rias"]/../following-sibling::')->each(function($node,$i){

            return $node;
        });*/

        
        //$eliminatoriasTexto = $conteudoPagina->filterXPath('//h2/span[@id="Eliminat.C3.B3rias"]/../following-sibling::p[*]');
        //$eliminatoriasTexto = $conteudoPagina->filterXPath('//h3/span[@id="Equipas_classificadas"]');
        //var_dump($eliminatoriasTexto[1][1]);
        //var_dump(utf8_encode($eliminatoriasTexto[1][0]->text()));

    }
}
