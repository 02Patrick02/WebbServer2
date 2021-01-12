<?php

require "../include/connect.php";

$sql="SELECT * FROM products";

$res=$dbh->prepare($sql);
$res->execute();
$result=$res->get_result();
$dbh->close();
?>

<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Produkter</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
  <body id="sida3">
    <div id="wrapper">
      
	<?php 
		require "masthead.php";
		require "meny.php";
	?>
			
			<main> <!--Huvudinnehåll-->
				<section id="content">
					<h2>Varor</h2>
          
            <figure><img src="bilder/apple.jpg" alt="Grönt surt">
                <figcaption>Äpple 50
  
                </figcation>
            </figure>
            
			</section>
				
				
			</main>
			
			<aside id="aside">
				   <p>News</p>
			</aside>
		</div>
		<!--Egen fil -->
		<?php 
			require "footer.php";
		?>
  
  </body>
</html>