<?php
$nombre = $_GET['nombre'];


$pregunta1 = $_GET['pregunta1'];
$incorrecta1 = $_GET['incorrecta1'];
$incorrecta2 = $_GET['incorrecta2'];
$correcta1 = $_GET['correcta1'];


$pregunta2 = $_GET['pregunta2'];
$incorrecta1_2 = $_GET['incorrecta1_2'];
$incorrecta2_2 = $_GET['incorrecta2_2'];
$correcta2 = $_GET['correcta2'];


$pregunta3 = $_GET['pregunta3'];
$incorrecta1_3 = $_GET['incorrecta1_3'];
$incorrecta2_3 = $_GET['incorrecta2_3'];
$correcta3 = $_GET['correcta3'];


$pregunta4 = $_GET['pregunta4'];
$incorrecta1_4 = $_GET['incorrecta1_4'];
$incorrecta2_4 = $_GET['incorrecta2_4'];
$correcta4 = $_GET['correcta4'];


$pregunta5 = $_GET['pregunta5'];
$incorrecta1_5 = $_GET['incorrecta1_5'];
$incorrecta2_5 = $_GET['incorrecta2_5'];
$correcta5 = $_GET['correcta5'];

$n_arch = fopen("Trivias/$nombre.csv", "w");

fputcsv($n_arch, [$nombre]);
fputcsv($n_arch, [$pregunta1, $incorrecta1, $incorrecta2, $correcta1]);
fputcsv($n_arch, [$pregunta2, $incorrecta1_2, $incorrecta2_2, $correcta2]);
fputcsv($n_arch, [$pregunta3, $incorrecta1_3, $incorrecta2_3, $correcta3]);
fputcsv($n_arch, [$pregunta4, $incorrecta1_4, $incorrecta2_4, $correcta4]);
fputcsv($n_arch, [$pregunta5, $incorrecta1_5, $incorrecta2_5, $correcta5]);

fclose($n_arch);

header("Location: main.php");
?>
