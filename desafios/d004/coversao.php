<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio_PHP_03</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
        <?php
            //cotacao vinda da API do Banco Central
            $incio = date("m-d-Y", strtotime("-7 days"));
            $fim =  date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'11-03-2025\'&@dataFinalCotacao=\'11-07-2025\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);

            $cotacao = $dados["value"][0]["cotacaoCompra"];

            //Quanto $$ vc tem?
            $real = $_REQUEST["din"] ?? 0;

            //Equivalencia em dolar
            $dolar = $real / $cotacao;

            // Mostrar o resultado

            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            echo "<p>Seus " . numfmt_format_currency($padrao, $real, "BRL"). " Equivalem a <strong>" . numfmt_format_currency($padrao, $dolar, "USD") . "</strong></p>";
        ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>

</body>
</html>
