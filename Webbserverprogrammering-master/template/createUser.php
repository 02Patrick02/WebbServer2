<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
  <body id="login">
    <div id="wrapper">
	
     <?php
	  require "masthead.php";
	  require "meny.php";
	 ?>
      
      <nav>
        <ul>
          <li><a href="index.html">Start</a></li>
          <li><a href="products.html">Produkter</a></li>
          <li><a href="sida3.html">Varusida</a></li>
          <li><a href="login.html">Logga in</a></li>
        </ul>
      </nav>
		
			<main> <!--Huvudinnehåll-->
				<section>
				<form action="createUser2.php" method="post">
				<p><label for="fname">Förnamn:</label>
				<input type="text" id="fname" name="fname"></p>
				<p><label for="ename">Efternamn:</label>
				<input type="text" id="ename" name="ename"><p>
				<p><label for="mail">Epost:</label>
				<input type="text" id="mail" name="mail"></p>
				<p><label for="adress">Adress:</label>
				<input type="text" id="adress" name="adress"></p>
				<p><label for="fname">Post:</label>
				<input type="text" id="fname" name="fname"></p>
				<p><label for="pwd">Lösenord:</label>
				<input type="text" id="pwd" name="password"></p>
				<p>
				<input type="submit" value="skapa användare">
                </p>
          </form>
          <p class="create"><a href="#">Skapa användare</a></p>
				</section>
			</main>

    </div>
			<?php
			require "footer.php";
			?>

	</body>
</html>