<?php
$cuenta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archivo = 'cuentas.txt';
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (count($lineas) > 0) {
        $cuenta = array_shift($lineas); // Toma la primera cuenta
        file_put_contents($archivo, implode(PHP_EOL, $lineas)); // Guarda el resto
    } else {
        $cuenta = "NO DISPONIBLE|NO DISPONIBLE";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador SSH</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #101820;
            color: #fff;
            text-align: center;
            padding-top: 50px;
        }
        .cuadro {
            background: #1c1f26;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 0 auto;
        }
        button {
            padding: 10px 20px;
            border: none;
            background: #00aaff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .datos {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="cuadro">
        <h2>Generador de cuentas SSH</h2>
        <form method="post">
            <button type="submit">Generar Cuenta</button>
        </form>

        <?php if ($cuenta): 
            list($user, $pass) = explode('|', $cuenta);
        ?>
            <div class="datos">
                Usuario: <?php echo htmlspecialchars($user); ?><br>
                Contraseña: <?php echo htmlspecialchars($pass); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
