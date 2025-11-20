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
        $total = $_REQUEST['seg'] ?? 0;
    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="seg">Quantidade de segundos:</label>
            <input type="number" name="seg" id="seg" min="0" step="1" required value="<?=$total?>">
            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php
        $sobra = $total;
        //Total de Semanas
        $semanas = intdiv($sobra, 604800);
        $sobra = $sobra % 604800;
        //Total de Dias
        $dias = intdiv($sobra, 86400);
        $sobra = $sobra % 86400;
        //Total de Horas
        $horas = intdiv($sobra, 3600);
        $sobra = $sobra % 3600;
        //Total de Minutos
        $minutos = intdiv($sobra, 60);
        $sobra = $sobra % 60;
        //Total de Segundos
        $segundos = $sobra;
    ?>

    <section>
        <h2>Totalizando segundos</h2>
        <p>Analisando o valor que você digitou, <strong><?=number_format($total, 0, ",", ".")?> segundos</strong> equivale a um total de:</p>
        <ul>
            <li><?=$semanas?> Semanas</li>
            <li><?=$dias?> Dias</li>
            <li><?=$horas?> Horas</li>
            <li><?=$minutos?> Minutos</li>
            <li><?=$segundos?> Segundos</li>
            </ul>
    </section>

</body>
</html>
