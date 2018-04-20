<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author " content="Thomas Aarts">
    <meta charset="UTF-8">
    <title> gar-read-auto.php </title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage read auto</h1>
<p>
    Dit zijn alle gegevens uit de
    tabel auto van de database garage.
</p>
<?php
// tabel uitlezen en netjes afdrukken ------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
select  autokenteken,
        automerk,
        autotype,
        autokilometerstand,
        klantid
from auto
");
$sql->execute();

echo "<table>";
foreach ($sql as $rij) {
    echo "<tr>";
    echo "<td>" . $rij["autokenteken"] . "</td>";
    echo "<td>" . $rij["automerk"] . "</td>";
    echo "<td>" . $rij["autotype"] . "</td>";
    echo "<td>" . $rij["autokilometerstand"] . "</td>";
    echo "<td>" . $rij["klantid"] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>