<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author" content="Thomas Aarts"
    <meta charset="UTF-8">
    <title> gar-delete-auto3.php </title>
    <link rel="stylesheet" href="garage.css" type="text/css">
</head>
<body>
<h1>garage delete auto 3</h1>
<p>
    Op kenteken gegevens zoeken uit de
    tabel auto van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
// auto gegevens uit het formulier halen ----------------
$autokenteken = $_POST["autokentekenvak"];
$verwijderen = $_POST["verwijdervak"];

// auto gegevens verwijderen ----------------
if ($verwijderen) {
    require_once "gar-connect.php";

    $sql = $conn->prepare("
    delete from auto
    where autokenteken = :autokenteken
    ");
    $sql->execute(["autokenteken" => $autokenteken]);

    echo "De gegevens zijn verwijderd. <br />";
}
else
{
    echo "De gegevens zijn niet verwijderd. <br />";
}
echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
?>
</body>
</html>