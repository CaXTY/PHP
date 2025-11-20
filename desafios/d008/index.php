<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio_PHP</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
    <style>
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $numero = $_GET['num'] ?? 1;
    ?>
    <main>
        <h1>Informe um Número Inteiro</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="request">
            
            <label for="num">Número Inteiro</label>
            <input type="number" name="num" id="num" value="<?= $numero?>">
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
    <section>
        <h2>Resultado</h2>
        <?php
            $rq = $numero ** (1/2);
            $rc = $numero ** (1/3);

            echo "<p>Analisando o <strong> número $numero</strong>, temos:";
            echo "<ul><li> A raiz quadrada é <strong>" . number_format($rq, 3, ",", ".") . "</strong></li>";
            echo "<li> A raiz cúbica é <strong>" . number_format($rc, 3, ",", ".") . "</strong></li></ul>";
            echo "</p>";
        ?>
    </section>

</body>
</html>
