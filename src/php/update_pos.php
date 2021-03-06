<?php

header('Location: index.php');

$x0 = $_POST['x0'];
$y0 = $_POST['y0'];
$z0 = $_POST['z0'];

$x1 = $_POST['x1'];
$y1 = $_POST['y1'];
$z1 = $_POST['z1'];

$x2 = $_POST['x2'];
$y2 = $_POST['y2'];
$z2 = $_POST['z2'];

try {
	$dbh = new PDO('sqlite:/home/pi/raspi-rfid-tracking/src/measurements.db');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);	
	$sth = $dbh->prepare('UPDATE positions SET x = ?, y = ?, z = ? WHERE node_name = ?');
	
	$sth->execute(array($x0, $y0, $z0, 0));
	$sth->execute(array($x1, $y1, $z1, 1));
	$sth->execute(array($x2, $y2, $z2, 2));
	
	$dbh = NULL;
} catch(PDOException $e) {
	echo 'Exception: '.$e->getMessage();
}

exit();

?>
