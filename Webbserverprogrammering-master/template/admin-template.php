<?php
	require "../include/connect.php";
	
	$sql = "SELECT * FROM users WHERE username = ?";	
	$res=$dbh->prepare($sql);
	$res->execute();
	$result=$res->get_result();
?>

<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>admin</title>
		 <link rel="stylesheet" href="css/stilmall.css">
  </head>
  <body id="admin">
    <div id="wrapper">
	
	<?php 
		require "masthead.php";
		require "meny.php";
	?>
		
		
		<main> <!--Huvudinnehåll-->
			<section id="content">
				<h2>Användare</h2>
				<table>	
					<thead>
						<tr>
							<th>Namn</th>
							<th>Efternamn</th>
							<th>Adress</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					
					<?php
					while($row=$result->fetch_assoc()){
						echo "<tr><td>";
						echo $row['firstname'];
						echo "</td><td>";
						echo $row['lastname'];
						echo "<td></td>";
						echo $row['adress'];
						echo "</td><td>";
					}
					?>
					

			</section>
		</main>
		<?php 
			require "footer.php";
		?>
	</div>
  </body>
</html>