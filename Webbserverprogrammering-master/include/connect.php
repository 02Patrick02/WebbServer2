<?php
	$dbh = new mysqli("localhost", "username", "password", "webbshop");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
?>