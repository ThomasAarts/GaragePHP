<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author " content="Thomas Aarts">
    <meta charset="UTF-8">
    <title> gar-create-auto2.php </title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    Een auto toevoegen aan de tabel
    auto in de database garage.
</p>
<?php
// autogegevens uit het formulier halen ------------------------
$autokenteken = $_POST["autokentekenvak"];
$automerk = $_POST["automerkvak"];
$autotype = $_POST["autotypevak"];
$autokilometerstand = $_POST["autokilometerstandvak"];
$klantid = $_POST["klantidvak"];

// autogegevens invoeren in de tabel ---------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("insert into auto values (:autokenteken, :automerk, :autotype,:autokilometerstand, :klantid)");

$sql->execute([
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokilometerstand" => $autokilometerstand,
    "klantid" => $klantid
]);

echo "De auto is toegevoegd <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>