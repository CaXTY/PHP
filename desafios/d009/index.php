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
        //Recebendo os dados
        $valor1 = $_POST['v1'] ?? '';
        $peso1 = $_POST['p1'] ?? '';
        $valor2 = $_POST['v2'] ?? '';
        $peso2 = $_POST['p2'] ?? '';
    ?>

    <main>
        <h1>Médias Aritmética e Ponderada</h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">

            <label for="v1">1º Valor</label>
            <input type="number" name="v1" id="v1" required value="<?=$valor1?>">
            <label for="p1">1º Peso</label>
            <input type="number" name="p1" id="p1" required value="<?=$peso1?>">
            <label for="v2">2º Valor</label>
            <input type="number" name="v2" id="v2" required value="<?=$valor2?>">
            <label for="p2">2º Peso</label>
            <input type="number" name="p2" id="p2" required value="<?=$peso2?>">
            <input type="submit" value="Calcular Médias">
        </form>
    </main>

    <?php if (!empty($valor1) && !empty($valor2)): ?> <!-- Verifica se os valores foram preenchidos -->
    <section>
        <?php
            //Processamento dos dados
            $ma = ($valor1 + $valor2) / 2;

            // Verifica se os pesos não são zero para evitar divisão por zero
            if (($peso1 + $peso2) > 0) {
                $mp = ($valor1 * $peso1 + $valor2 * $peso2) / ($peso1 + $peso2);
            } else {
                $mp = 0;
            }
        ?>
        <h2>Cálculo das Médias</h2>
        <p>Analisando os valores <strong><?=$valor1?></strong> e <strong><?=$valor2?></strong>:</p>
        <ul>
            <li>A <strong>Média Aritmética Simples</strong> entre os valores é igual a <strong><?=number_format($ma, 2, ",", ".")?></strong>.</li>
            <li>A <strong>Média Ponderada</strong> com pesos <strong><?=$peso1?></strong> e <strong><?=$peso2?></strong> é igual a <strong><?=number_format($mp, 2, ",", ".")?></strong>.</li>
        </ul>
    </section>
    <?php endif; ?>

</body>
</html>
