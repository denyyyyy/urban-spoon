<?php
    $host = "localhost";
	$user = "root";
	$dbname = "karte_rezekne_illumination";
	
	$conn = new mysqli($host, $user, '', $dbname);

    $sql = "INSERT INTO coords (lat, lng, lx, time) 
                        VALUES (" . $_POST['latitude'] . ", " . $_POST['longitude'] . ", " . $_POST['lx'] . ", '" . date('Y-m-d H:i:s', strtotime($_POST['time'])) . "')";

    if ($conn->query($sql)) {
        echo "Dati veiksmīgi ievadīti datu bāzē.";
    } else {
        echo "ERROR!Notikusi kļūda!";
    }
?>