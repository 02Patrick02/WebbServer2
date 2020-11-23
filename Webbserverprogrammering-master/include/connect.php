<?php
	$dbh = new mysqli("localhost", "username", "patrick", "webbshop3");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
?>