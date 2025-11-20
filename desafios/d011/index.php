<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio_PHP</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        $preco = $_REQUEST['preco'] ?? '0';
        $reaj = $_REQUEST['reaj'] ?? '0';
    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" min="0.10" step="0.01" value="<?=$preco?>">

            <label for="reaj">Quanto será o reajuste (%) (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="reaj" id="reaj" min="0" max="100" step="1" oninput="mudaValor()" value="<?=$reaj?>">

            <input type="submit" value="Reajustar">
        </form>
    </main>
    <?php
        $aumento = ($preco * $reaj) / 100;
        $novoPreco = $preco + $aumento;
    ?>
    <section>
        <h2>Resultado do reajuste</h2>
        <p>O produto que custava <strong>R$<?=number_format($preco, 2, ",", ".")?></strong>, com <strong><?=$reaj?>% de aumento</strong> vai passar a custar <strong>R$<?=number_format($novoPreco, 2, ",", ".")?></strong> a partir de agora.</p>
    </section>
    <script>
        //Declaração da função mudaValor
        mudaValor()

        function mudaValor() {
            p.innerText = reaj.value;
        }
    </script>

</body>
</html>
