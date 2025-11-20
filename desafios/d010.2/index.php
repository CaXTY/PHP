<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Idade</title>
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        main {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2.2em;
        }

        h2 {
            text-align: center;
            color: #667eea;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
        }

        input[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
        }

        .current-year {
            background: #667eea;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9em;
        }

        section {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-left: 5px solid #667eea;
        }

        .resultado {
            text-align: center;
            font-size: 1.2em;
            line-height: 1.6;
        }

        .idade {
            color: #667eea;
            font-size: 1.4em;
            font-weight: bold;
        }

        .ano {
            color: #764ba2;
            font-weight: bold;
        }

        .error {
            background: #ffe6e6;
            border-left: 5px solid #ff4444;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            color: #cc0000;
        }

        @media (max-width: 768px) {
            main, section {
                margin: 20px;
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <?php
        // Configuração inicial
        $atual = date("Y");
        $nasc = $_POST['nasc'] ?? '2000';
        $ano = $_POST['ano'] ?? $atual;

        // Validações
        $erros = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar ano de nascimento
            if (empty($nasc) || $nasc < 1900 || $nasc > ($atual - 1)) {
                $erros[] = "Ano de nascimento deve estar entre 1900 e " . ($atual - 1);
            }

            // Validar ano futuro
            if (empty($ano) || $ano < 1900) {
                $erros[] = "O ano deve ser maior ou igual a 1900";
            }

            // Validar se ano futuro é maior que nascimento
            if ($ano < $nasc) {
                $erros[] = "O ano futuro não pode ser menor que o ano de nascimento";
            }
        }

        // Cálculo da idade
        $idade = $ano - $nasc;
        $exibirResultado = ($_SERVER['REQUEST_METHOD'] === 'POST') && empty($erros);
    ?>

    <main>
        <h1>📅 Calculadora de Idade</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
                <label for="nasc">Ano de Nascimento:</label>
                <input type="number" name="nasc" id="nasc" min="1900" max="<?=($atual - 1)?>"
                       value="<?=htmlspecialchars($nasc)?>" required>
            </div>

            <div class="form-group">
                <label for="ano">Quer saber sua idade em que ano?
                    <span class="current-year">(atualmente estamos em <?=$atual?>)</span>
                </label>
                <input type="number" name="ano" id="ano" min="1900"
                       value="<?=htmlspecialchars($ano)?>" required>
            </div>

            <input type="submit" value="🔍 Qual será a minha idade?">
        </form>
    </main>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <section>
            <?php if (!empty($erros)): ?>
                <div class="error">
                    <h2>❌ Erros encontrados:</h2>
                    <ul>
                        <?php foreach ($erros as $erro): ?>
                            <li><?=$erro?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php elseif ($exibirResultado): ?>
                <h2>📊 Resultado do Cálculo</h2>
                <div class="resultado">
                    <p>Quem nasceu em <strong class="ano"><?=$nasc?></strong> vai ter
                       <strong class="idade"><?=$idade?> anos</strong> em
                       <strong class="ano"><?=$ano?></strong>.</p>

                    <?php if ($ano == $atual): ?>
                        <p style="margin-top: 15px; color: #666;">
                            🎉 Esta é sua idade atual!
                        </p>
                    <?php elseif ($ano > $atual): ?>
                        <p style="margin-top: 15px; color: #666;">
                            🔮 Esta será sua idade no futuro!
                        </p>
                    <?php else: ?>
                        <p style="margin-top: 15px; color: #666;">
                            📚 Esta era sua idade nesse ano!
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

</body>
</html>
