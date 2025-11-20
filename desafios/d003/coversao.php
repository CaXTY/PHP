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
        
            $cotacoes = array (
            'dolar' => 5.38,
            'euro' => 6.20,
            'libra' => 7.07
        );

            $moedaSelecionada = $_GET["moeda"] ?? 0;
            $real = $_GET["din"] ?? 0;

            // Verifcar se a reposta foi bem sucedida
            if (isset($cotacoes[$moedaSelecionada])) {

                //Obter as cotacoes das moedas desejadas
                $cotacaoSelecionada = $cotacoes[$moedaSelecionada];
                $valorConvertido = $real / $cotacaoSelecionada;

                //Exibir o resultado
                echo "<p>Seus <strong>R$ " . number_format($real, 2, ",", ".") . "</strong> equivalem a</p>";
                echo "<p><strong>" . strtoupper($moedaSelecionada) . " " . number_format($valorConvertido, 2, ",", ".") . "</strong></p>";
                echo "<p class='cotacao'>Cotação: R$ " . number_format($cotacaoSelecionada, 2, ",", ".") . "</p>";
                echo "</div>";
            } else {
                //Mostrar mensagem de erro para a moeda nao encontrada
                echo "Moeda nao encontrada.";
            }
        ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>

</body>
</html>
