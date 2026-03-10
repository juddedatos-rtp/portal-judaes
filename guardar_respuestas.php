<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$genero = $_POST["genero"];
$frecuencia = $_POST["frecuencia"];
$dispositivos = isset($_POST["dispositivo"]) ? implode(", ", $_POST["dispositivo"]) : "Ninguno";
$comentarios = str_replace(array("\r","\n")," ",$_POST["comentarios"]);

$archivo_csv = __DIR__ . "/respuestas.csv";

if (!file_exists($archivo_csv)) {
    $file = fopen($archivo_csv,"w");
    fputcsv($file, ["Nombre","Edad","Genero","Frecuencia","Dispositivos","Comentarios"]);
    fclose($file);
}

$file = fopen($archivo_csv,"a");

if($file){
    fputcsv($file, [$nombre,$edad,$genero,$frecuencia,$dispositivos,$comentarios]);
    fclose($file);
}

echo "<div style='text-align:center;margin-top:50px'>";
echo "<h2>Encuesta enviada correctamente</h2>";
echo "<p>Gracias <b>$nombre</b> por participar.</p>";
echo "<br>";
echo "<a href='index.html'>Volver a la encuesta</a>";
echo "<br><br>";
echo "<a href='resultados.php'>Ver resultados</a>";
echo "</div>";

}else{
echo "Acceso no permitido";
}
?>