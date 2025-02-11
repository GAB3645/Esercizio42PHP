<?php 
include "connessione.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>
</head>
<body style="text-align: center;">


    <form action="eliminaRecensione.php" method="get">

    <label> Scegli l'id da eliminare</label>

        <select name="scelta">

            <?php
            $query = "SELECT IDRecensione FROM recensioni WHERE voto <= 3";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['IDRecensione'] . "'>" . $row['IDRecensione'] . "</option>";
                }
            } else {
                echo "<p>Nessuna recensione da mostrare</p>";
            }
            ?>

        </select>

        <input type="submit" value="Invia">
    </form>



</body>
</html>

