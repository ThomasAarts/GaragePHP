<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author" content="Thomas Aarts"
    <meta charset="UTF-8">
    <title>gar-zoek-auto2.php</title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage zoek op auto 2</h1>
<p>
    Op auto gegevens zoeken uit de
    tabel klanten van de database garage.
</p>
<?php
// klantid uit het formulier halen -------------------------
$autokenteken = $_POST["autokentekenvak"];

// klantgegevens uit tabel halen ---------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
select  autokenteken,
        automerk,
        autotype,
        autokilometerstand,
        klantid
from   auto
where  autokenteken = :autokenteken
");
$sql->execute(["autokenteken" => $autokenteken]);

// klantgegevens laten zien ---------------------------------
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
echo "<table><br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>
