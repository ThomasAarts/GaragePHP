<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author" content="Thomas Aarts"
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage update auto 2</h1>
<p>
    Dit formulier wordt gebruikt om autogegevens te wijzigen
    in de tabel auto van de database garage.
</p>
<?php
// klantid uit het formulier halen ----------------------------
$autokenteken = $_POST["autokentekenvak"];

// klantgegevens uit de tabel halen ---------------------------
require_once "gar-connect.php";

$auto = $conn->prepare("
select  klantid,
        autokenteken,
        automerk,
        autotype,
        autokilometerstand
from    auto
where   autokenteken = :autokenteken
");
$auto->execute(["autokenteken" => $autokenteken]);

// klantgegevens in een nieuw formulier laten zien ---------------
echo "<form action='gar-update-auto3.php' method='post'>";
foreach($auto as $autos)
{
    // klantid mag niet gewijzigd worden
    echo " klantid:" . $autos["klantid"];
    echo " <input type='hidden' name='klantidvak' ";
    echo " value=' " . $autos["klantid"] . " '> <br /> ";

    echo " autokenteken: <input type='text' ";
    echo " name  = 'autokentekenvak' ";
    echo " value = '" .$autos["autokenteken"]. "' ";
    echo " > <br />";

    echo " automerk: <input type='text' ";
    echo " name  = 'automerkvak' ";
    echo " value = '" .$autos["automerk"]. "' ";
    echo " > <br />";

    echo " autotype: <input type='text' ";
    echo " name  = 'autotypevak' ";
    echo " value = '" .$autos["autotype"]. "' ";
    echo " > <br />";

    echo " autokmstand: <input type='text' ";
    echo " name  = 'autokilometerstandvak' ";
    echo " value = '" .$autos["autokilometerstand"]. "' ";
    echo " > <br />";
}
echo "<input type='submit'>";
echo "</form>";

// er moet eigenlijk nog gecontroleerd worden op een bestaand klantid
?>
</body>
</html>