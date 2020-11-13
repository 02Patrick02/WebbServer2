<?php
	$dbh = new mysqli("localhost", "username", "patrick", "webbshop3");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
	
	$sql = "SELECT * FROM products";	
	$res=$dbh->prepare($sql);
	$res->execute();
	$result=$res->get_result();
	
	
	if(!$result){
		echo "Felaktig SQL fråga";
		exit;
	}
	
	
	echo "<table><tr><th>Name</th>
			<th>Descrpition</th>
			<th>Price</th>
			<th>Picture</th>
			</tr>";
	while($row = $result->fetch_assoc()){
	echo "<tr><td>";
	echo $row['name'];
	echo "</td><td>";
	echo $row['description'];
	echo "</td><td>";
	echo $row['price'];
	echo "</td><td>";
	echo $row ['picture'];
	echo "</td></tr>";
	
	}
	echo "</table>";
	
	echo "<br><br>";
	
	$sql = "SELECT users.username, users.email, customers.username, customers.firstname, customers.lastname FROM users
	JOIN customers WHERE users.username = customers.username";
	$res=$dbh->prepare($sql);
	$res->execute();
	$result=$res->get_result();
	
	if(!$result){
		echo "Felaktig SQL fråga";
		exit;
	}
?>