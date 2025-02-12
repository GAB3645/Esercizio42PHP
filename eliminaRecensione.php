<?php 
include "connessione.php";
?>


<?php


$scelta = $_GET['scelta'];

$query = "SELECT * FROM recensioni WHERE IDRecensione = $scelta";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    echo "<table style = 'border: 1px solid black; text-align: center; margin: auto; width: 50%; font-size: 30px'>";
    $firstRow = $result->fetch_assoc();
    echo "<tr>";
    foreach(array_keys($firstRow) as $key){
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";
    
    do {
        echo "<tr>";
        foreach($firstRow as $value){
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    } while ($firstRow = $result->fetch_assoc());
    echo "</table>";
}




$deleteQuery = "DELETE FROM recensioni WHERE IDRecensione = $scelta";
if ($conn->query($deleteQuery) === TRUE) {
    echo "<p style='color: green; text-align: center; font-size: 20px'>Recensione eliminata con successo.</p>";
} else {
    echo "<p style='color: red; text-align: center; font-size: 20px'>Errore nell'eliminazione: " . $conn->error . "</p>";
}



?>
