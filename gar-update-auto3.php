<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author" content="Thomas Aarts"
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    Autogegevens wijzigen in de tabel
    auto van de database garage.
</p>
<?php
// klantgegevens uit het formulier halen -----------------------------
$autokenteken  = $_POST["autokentekenvak"];
$automerk      = $_POST["automerkvak"];
$autotype      = $_POST["autotypevak"];
$autokilometerstand   = $_POST["autokilometerstandvak"];
$klantid       = $_POST["klantidvak"];

// updaten klantgegevens ---------------------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
update auto set   autokenteken  = :autokenteken,
                  automerk      = :automerk,
                  autotype      = :autotype,
                  autokilometerstand   = :autokilometerstand
                  where autokenteken = :autokenteken
");

$sql->execute
([
    "autokenteken"   => $autokenteken,
    "automerk"       => $automerk,
    "autotype"       => $autotype,
    "autokilometerstand"    => $autokilometerstand,
    "klantid"        => $klantid,
]);

echo "De auto is gewijzigd. <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>