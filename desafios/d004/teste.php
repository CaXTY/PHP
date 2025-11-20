<pre>
<?php

   $incio = date("m-d-Y", strtotime("-7 days"));
   $fim =  date("m-d-Y");
   $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'11-03-2025\'&@dataFinalCotacao=\'11-07-2025\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

   $dados = json_decode(file_get_contents($url), true);

   var_dump($dados);

   $cotacao = $dados["value"][0]["cotacaoCompra"];

   echo "A cotação foi  $cotacao";
?>
</pre>
