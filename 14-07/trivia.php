<?php
if (isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];
    $ruta = "Trivias/$archivo";

    if (!file_exists($ruta)) {
        echo "<div class='alert alert-danger m-4'>Ups! No encontramos esa trivia 😢</div>";
        exit;
    }

    $lineas = file($ruta);
    if (count($lineas) < 6) {
        echo "<div class='alert alert-warning m-4'>La trivia está incompleta 🤔</div>";
        exit;
    }

    $preguntas = [];
    $respuestas_usuario = [];
    $puntaje = 0;

    for ($i = 1; $i <= 5; $i++) {
        $datos = explode(",", trim($lineas[$i]));
        $preguntas[] = $datos;
        $correcta = $datos[3];
        $respuesta_usuario = $_POST["preg$i"] ?? '';
        $respuestas_usuario[] = $respuesta_usuario;

        if ($respuesta_usuario == $correcta) {
            $puntaje++;
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Oswald', sans-serif;
        }
    </style>

        <meta charset="UTF-8" />
        <title>Resultado trivia</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
    </head>
    <body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="text-center mb-4 text-success">¡Resultados! </h2>

        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="card mb-3 <?php echo ($respuestas_usuario[$i] == $preguntas[$i][3]) ? 'border-success' : 'border-danger'; ?>">
                <div class="card-body">
                    <h5 class="card-title">Pregunta <?php echo $i + 1; ?></h5>
                    <p><strong><?php echo htmlspecialchars($preguntas[$i][0]); ?></strong></p>
                    <p>Tu respuesta: <strong><?php echo htmlspecialchars($respuestas_usuario[$i]); ?></strong></p>
                    <p>Estado:
                        <?php echo ($respuestas_usuario[$i] == $preguntas[$i][3])
                            ? "<span class='text-success fw-bold'>¡Correcto! ✅</span>"
                            : "<span class='text-danger fw-bold'>Incorrecto ❌</span>"; ?>
                    </p>
                    <?php if ($respuestas_usuario[$i] != $preguntas[$i][3]): ?>
                        <p>Respuesta correcta: <span class="fw-bold text-success"><?php echo htmlspecialchars($preguntas[$i][3]); ?></span></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endfor; ?>

        <h3 class="text-center mt-4">Puntaje total: <span class="text-primary"><?php echo $puntaje; ?> / 5</span></h3>

        <div class="text-center mt-4">
            <a href="listar.php" class="btn btn-warning fw-bold px-4">Volver a jugar</a>
        </div>
    </div>
    </body>
    </html>

    <?php
    exit;
} elseif (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];
} else {
    echo "<div class='alert alert-warning m-4 text-center fw-bold'>No seleccionaste ninguna trivia 😅</div>";
    exit;
}

$ruta = "Trivias/$archivo";

if (!file_exists($ruta)) {
    echo "<div class='alert alert-danger m-4 text-center fw-bold'>Esa trivia no está 😢</div>";
    exit;
}

$lineas = file($ruta);

if (count($lineas) < 6) {
    echo "<div class='alert alert-warning m-4 text-center fw-bold'>Trivias incompleta, ¿le pusiste todas las respuestas? 🤔</div>";
    exit;
}

$nombreTrivia = trim($lineas[0]);
$preguntas = [];

for ($i = 1; $i <= 5; $i++) {
    $datos = explode(",", trim($lineas[$i]));
    $texto = $datos[0];
    $opciones = [$datos[1], $datos[2], $datos[3]];
    shuffle($opciones);
    $preguntas[] = ['texto' => $texto, 'opciones' => $opciones];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Trivia: <?php echo htmlspecialchars($nombreTrivia); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
</head>
<body class="bg-gradient bg-opacity-10">
<div class="container mt-5" style="max-width: 700px;">
    <h2 class="text-center mb-4 text-info fw-bold">Trivia: <?php echo htmlspecialchars($nombreTrivia); ?></h2>

    <form method="POST" action="trivia.php" class="p-4 bg-white rounded shadow-sm border border-info">
        <input type="hidden" name="archivo" value="<?php echo htmlspecialchars($archivo); ?>">

        <?php foreach ($preguntas as $index => $preg): ?>
            <div class="mb-4">
                <h5 class="fw-semibold mb-3"><?php echo ($index + 1) . ". " . htmlspecialchars($preg['texto']); ?></h5>
                <?php foreach ($preg['opciones'] as $op): ?>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="preg<?php echo $index + 1; ?>" id="preg<?php echo $index + 1 . md5($op); ?>" value="<?php echo htmlspecialchars($op); ?>" required>
                        <label class="form-check-label" for="preg<?php echo $index + 1 . md5($op); ?>">
                            <?php echo htmlspecialchars($op); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-info fw-bold">Enviar y ver si acertaste 🎯</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <a href="listar.php" class="btn btn-warning fw-semibold px-4">Volver a la lista</a>
    </div>
</div>
</body>
</html>
