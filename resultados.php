<?php
$archivo = "respuestas.csv";

echo "<h2>Resultados de la encuesta</h2>";

if (($handle = fopen($archivo, "r")) !== FALSE) {

echo "<table border='1' cellpadding='8'>";

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

echo "<tr>";

foreach ($data as $celda) {
echo "<td>$celda</td>";
}

echo "</tr>";
}

echo "</table>";

fclose($handle);
}
?>