<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio_PHP</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        $dividendo = $_REQUEST['d1'] ?? 0;
        $divisor = $_REQUEST['d2'] ?? 1;
    ?>
    <main>
        <h1>Anatomia de uma Divisão</h1>
        <form action="" method="request">
            
            <label for="d1">Dividendo</label>
            <input type="number" name="d1" id="d1" min="0" value="<?=$dividendo?>">
            <label for="d2">Divisor</label>
            <input type="number" name="d2" id="d2" min="1" value="<?=$divisor?>">
            <input type="submit" value="Analisar Divisão">
        </form>
    </main>

    <section>
        <h2>Estrutura da Divisão</h2>
        <?php
            //CALCULOS
            $quociente = intdiv($dividendo, $divisor);
            $resto = $dividendo % $divisor;
        ?>

        <table class="divisao">
            <tr>
                <td><?=$dividendo?></td>
                <td><?=$divisor?></td>
            </tr>
            <tr>
                <td><?=$resto?></td>
                <td><?=$quociente?></td>
            </tr>
        </table>
    </section>

</body>
</html>
