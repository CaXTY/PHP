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
        $minimo = 1_518.00;
        $salario = $_REQUEST['sal'] ?? $minimo;
    ?>

    <main>
        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="request">
            
            <label for="sal">(R$) Salário</label>
            <input type="number" name="sal" id="sal" value="<?=$salario?>" step="0.01">
            <p>Considerando o salário mínimo em <strong>2025</strong> de <strong>R$<?= number_format($minimo, 2, ",", ".")?>
            </strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
        <h2>Resultado do cálculo</h2>
        <?php
            $tot = intdiv($salario, $minimo);
            $dif = $salario % $minimo;

            echo "<p>Quem recebe um salário de <strong>R\$". number_format($salario, 2, ",", ".")."</strong> ganha <strong>$tot salário mínimo</strong> + <strong>R\$ ". number_format($dif, 2, ",", ".") ."
            </strong></p>";
        ?>
    </section>

</body>
</html>
