<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Trivia</title>
    <?php include "boostrap.php"; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Oswald', sans-serif;
        }
    </style>

</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4 text-danger">Crear una nueva Trivia</h2>
    <form action="crear.php" method="GET" class="mx-auto" style="max-width: 600px;">
        <div class="mb-4">
            <label for="nombre" class="form-label fw-bold">Nombre de la Trivia</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre de la trivia" class="form-control" required>
        </div>

        <div class="mb-3">
            <h5 class="text-primary">Pregunta 1</h5>
            <input type="text" name="pregunta1" placeholder="Pregunta 1" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuestas incorrectas</label>
            <input type="text" name="incorrecta1" placeholder="Incorrecta 1" class="form-control mb-2" required>
            <input type="text" name="incorrecta2" placeholder="Incorrecta 2" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuesta correcta</label>
            <input type="text" name="correcta1" placeholder="Correcta" class="form-control" required>
        </div>

        <hr>

        <div class="mb-3">
            <h5 class="text-primary">Pregunta 2</h5>
            <input type="text" name="pregunta2" placeholder="Pregunta 2" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuestas incorrectas</label>
            <input type="text" name="incorrecta1_2" placeholder="Incorrecta 1" class="form-control mb-2" required>
            <input type="text" name="incorrecta2_2" placeholder="Incorrecta 2" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuesta correcta</label>
            <input type="text" name="correcta2" placeholder="Correcta" class="form-control" required>
        </div>

        <hr>

        <div class="mb-3">
            <h5 class="text-primary">Pregunta 3</h5>
            <input type="text" name="pregunta3" placeholder="Pregunta 3" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuestas incorrectas</label>
            <input type="text" name="incorrecta1_3" placeholder="Incorrecta 1" class="form-control mb-2" required>
            <input type="text" name="incorrecta2_3" placeholder="Incorrecta 2" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuesta correcta</label>
            <input type="text" name="correcta3" placeholder="Correcta" class="form-control" required>
        </div>

        <hr>

        <div class="mb-3">
            <h5 class="text-primary">Pregunta 4</h5>
            <input type="text" name="pregunta4" placeholder="Pregunta 4" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuestas incorrectas</label>
            <input type="text" name="incorrecta1_4" placeholder="Incorrecta 1" class="form-control mb-2" required>
            <input type="text" name="incorrecta2_4" placeholder="Incorrecta 2" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuesta correcta</label>
            <input type="text" name="correcta4" placeholder="Correcta" class="form-control" required>
        </div>

        <hr>

        <div class="mb-3">
            <h5 class="text-primary">Pregunta 5</h5>
            <input type="text" name="pregunta5" placeholder="Pregunta 5" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuestas incorrectas</label>
            <input type="text" name="incorrecta1_5" placeholder="Incorrecta 1" class="form-control mb-2" required>
            <input type="text" name="incorrecta2_5" placeholder="Incorrecta 2" class="form-control mb-2" required>

            <label class="form-label mt-3">Respuesta correcta</label>
            <input type="text" name="correcta5" placeholder="Correcta" class="form-control" required>
        </div>

           

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger px-5">Guardar Trivia</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <a href="listar.php" class="btn btn-primary">Ver trivias disponibles</a>
    </div>
</div>
</body>
</html>
