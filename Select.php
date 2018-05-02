<?php
    $host = "localhost";
	$user = "root";
	$dbname = "karte_rezekne_illumination";
	
	$conn = new mysqli($host, $user, '', $dbname);


    $sql = "SELECT lat, lng, lx FROM coords";
	$result = $conn->query($sql);
	
	$rows = array();
	while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
		$rows[] = $r;
	}
	echo json_encode($rows, JSON_NUMERIC_CHECK);
	
	$conn->close();
?>