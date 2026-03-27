<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wazenietirow";

$conn = mysqli_connect($host, $user, $pass, $dbname);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Ważenie samochodów ciężarowych</title>
    <link href="styl.css" rel="stylesheet">
</head>
<body>
    <div class="baner" id="baner1">
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </div>
    <div class="baner" id="baner2">
        <img src="obraz1.png" alt="waga">
    </div>

    <div id="left" class="center">
        <h2>Lokalizacje wag</h2>
        <?php
        if ($conn) {
            $kw2 = "SELECT ulica FROM lokalizacje;";
            $result1 = mysqli_query($conn, $kw2);

            echo "<ol>";
            while ($td = mysqli_fetch_row($result1)) {
                echo "<li>ulica $td[0]</li>";
            }
            echo "</ol>";
        }
        ?>

        <h2>Kontakt</h2>
        <a href="mailto:wazenie@wroclaw.pl">napisz</a>
    </div>

    <div id="middle" class="center">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestracja</th>
                <th>ulica</th>
                <th>waga</th>
                <th>dzień</th>
                <th>czas</th>
            </tr>
            <?php
            if ($conn) {
                $kw4 = "SELECT rejestracja, ulica, waga, dzien, czas FROM wagi JOIN lokalizacje ON wagi.lokalizacje_id=lokalizacje.id;";
                $result2 = mysqli_query($conn, $kw4);

                while ($td = mysqli_fetch_array($result2)) {
                    echo "<tr>";
                    echo "<td>$td[0]</td>";
                    echo "<td>$td[1]</td>";
                    echo "<td>$td[2]</td>";
                    echo "<td>$td[3]</td>";
                    echo "<td>$td[4]</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

    <div id="right" class="center">
        <img src="obraz2.jpg" alt="tir"> 
    </div>

    <footer>
        <p>Stronę wykonał: Kacper Krawczyk</p>
    </footer>

    <?php
    if ($conn) {
        $kw3 = "SELECT * FROM wagi WHERE waga > 10;";
        mysqli_query($conn, $kw3);

        header("Refresh: 10");

        mysqli_close($conn);
    }
    ?>
</body>
</html>
