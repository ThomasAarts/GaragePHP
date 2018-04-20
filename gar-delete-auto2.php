<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author" content="Thomas Aarts"
    <meta charset="UTF-8">
    <title> gar-delete-auto2.php </title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage delete auto 2</h1>
<p>
    Op kenteken gegevens zoeken uit de
    tabel auto van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
// auto uit het formulier halen ----------------
$autokenteken = $_POST["autokentekenvak"];

// autogegevens uit de tabel halen ----------------
require_once "gar-connect.php";

$auto = $conn->prepare("
select klantid,
autokenteken,
automerk,
autotype,
autokilometerstand
from auto
where autokenteken = :autokenteken
");
$auto->execute(["autokenteken" => $autokenteken]);

//autogegevens laten zien ------------------------
echo "<table>";
foreach ($auto as $autos) {
    echo "<tr>";
    echo "<td>" . $autos["klantid"] . "</td>";
    echo "<td>" . $autos["autokenteken"] . "</td>";
    echo "<td>" . $autos["automerk"] . "</td>";
    echo "<td>" . $autos["autotype"] . "</td>";
    echo "<td>" . $autos["autokilometerstand"] . "</td>";
    echo "<tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-auto3.php' method='post'>";
// kenteken mag niet meer gewijzigd worden
echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
// Waarde 0 doorgeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto.<br />";
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>