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
        $atual = date("Y");
        $nasc = $_REQUEST['nasc'] ?? '2000';
        $ano = $_REQUEST['ano'] ?? $atual;
    ?>
    <main>
        <h1>Calculando a idade</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="request">

            <label for="nasc">Ano de Nascimento:</label>
            <input type="number" name="nasc" id="nasc" min="1900" max="<?=($atual - 1)?>" value="<?=$nasc?>">
            <label for="ano">Quer saber sua idade em que ano? (atualmente estamos em <strong><?=$atual?></strong>)</label>
            <input type="number" name="ano" id="ano" min="1900" value="<?=$ano?>">
            <input type="submit" value="Qual sera a minha idade?">
        </form>
    </main>
    <section>
         <?php
            $idade = $ano - $nasc;
        ?>
        <h2>Calculando...</h2>
        <p>Quem nasceu em <?= $nasc?> vai ter <strong><?=$idade?> anos </strong> em <strong><?=$ano?></strong>.</p>
    </section>
</body>
</html>
