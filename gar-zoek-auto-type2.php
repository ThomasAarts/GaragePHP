<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-zoek-auto-type2.php</title>
    <link href="garage.css" rel="stylesheet" type="text/css">
</head>
<body>
        <h2 id="h2">Het auto type inclusief eigenaar 2</h2>
        <p>De gegevens:</p>
        <?php
        $autotype = $_POST["autotype"];
        require_once "gar-connect.php";
        $sql = $conn->prepare("SELECT auto.*, klant.* FROM auto INNER JOIN klant ON auto.klantid = klant.klantid WHERE autotype LIKE :autotype");
        $sql->execute(["autotype" => '%' . $autotype . '%']);
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>";
        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>" . $result["autokenteken"] . "</td>";
            echo "<td>" . $result["automerk"] . "</td>";
            echo "<td>" . $result["autotype"] . "</td>";
            echo "<td>" . $result["autokilometerstand"] . "</td>";
            echo "<td>" . $result["klantnaam"] . "</td>";
            echo "<td>" . $result["klantadres"] . "</td>";
            echo "<td>" . $result["klantpostcode"] . "</td>";
            echo "<td>" . $result["klantplaats"] . "</td>";
            echo "</tr>";
        }
        echo "</table><br />";
        echo "<a href='gar-menu.php'> terug naar het menu</a>";
        ?>
</body>
</html>