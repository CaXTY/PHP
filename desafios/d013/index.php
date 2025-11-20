<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio_PHP</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
    <style>
        img.nota {
            width: 100px;
            margin-right: 10px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $saque = $_REQUEST['saque'] ?? 0;
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="saque">Valor do saque: (R$) <sup>*</sup></label>
        <input type="number" name="saque" id="saque" step="5" required value="<?=$saque?>">
        <p style="font-size: 0.8em"><sup>*</sup>Notas disponíveis: <strong>$100, R$50, R$20, R$10, R$5</strong></p>
        <input type="submit" value="Sacar">
        </form>
    </main>
    <?php
        $resto = $saque;
        //Saque de R$100
        $nota100 = intdiv($resto, 100);
        $resto = $resto % 100;

        //Saque de R$50
        $nota50 = intdiv($resto, 50);
        $resto = $resto % 50;

        //Saque de R$20
        $nota20 = intdiv($resto, 20);
        $resto = $resto % 20;

        //Saque de R$10
        $nota10 = intdiv($resto, 10);
        $resto = $resto % 10;

        //Saque de R$5
        $nota5 = intdiv($resto, 5);
        $resto = $resto % 5;
    ?>

    <section>
        <h2>Saque de R$<?=number_format($saque, 2, ",", ".")?> realizado</h2>
        <p>O caixa eletrônico vai te fornecer as seguintes notas:</p>
        <ul>
            <li><img src="./img/100-reais.jpg" alt="Nota de R$100" class="nota"> <strong>x</strong><?=$nota100?></li>
            <li><img src="./img/50-reais.jpg" alt="Nota de R$50" class="nota"> <strong>x</strong><?=$nota50?></li>
            <li><img src="./img/20-reais.jpg" alt="Nota de R$20" class="nota"> <strong>x</strong><?=$nota20?></li>
            <li><img src="./img/10-reais.jpg" alt="Nota de R$10" class="nota"> <strong>x</strong><?=$nota10?></li>
            <li><img src="./img/5-reais.jpg" alt="Nota de R$5" class="nota"> <strong>x</strong><?=$nota5?></li>
        </ul>
    </section>

</body>
</html>
