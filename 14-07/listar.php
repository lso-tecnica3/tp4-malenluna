<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>listar Trivia</title>
    <?php include "boostrap.php"; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Oswald', sans-serif;
        }
    </style>
?>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4 text-info fw-bold"> ¡Trivias listas! </h1>
    <div class="row g-3">
        <?php
        $archivos = scandir("Trivias");
        for ($f = 2; $f < count($archivos); $f++) {
            $archivo = htmlspecialchars($archivos[$f]);
            ?>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3 text-primary">Trivia: <strong><?php echo $archivo; ?></strong></h5>
                        <a href="trivia.php?archivo=<?php echo $archivo; ?>" class="btn btn-info btn-sm px-4 fw-semibold">Jugar</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="text-center mt-5">
        <a href="main.php" class="btn btn-outline-info fw-bold px-5 py-2">+ Crear una trivia nueva</a>
    </div>
</div>
</body>
</html>
