<?php
$str="";
if(isset($_POST['Name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['picture'])){
		$Name = filter_input(INPUT_POST,'Name', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$description = filter_input(INPUT_POST,'description', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$price = filter_input(INPUT_POST,'price', FILTER_SANITIZE_NUMBER_INT);
		$picture = filter_input(INPUT_POST,'picture', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

		require "../include/connect.php";
		
		$target_dir = "./bilder";
		$target_file = $target_dir . basename($_FILES["../bilder"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$check = getimagesize($_FILES["picture"]["tmp_name"]);
		
if($check === false) {
	header("location:createProduct.php?errmsg=1");
}

if(!file_exists($target_file)) {
	header("location:createProduct.php?errmsg=2");
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	header("location.createProduct.php?errmsg=3");
}

if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
	$sql = "INSERT INTO products(Name, description, price, picture) VALUE(?,?,?,?)";
	$res=$dbh->prepare($sql);
	$res->bind_param("ssis",$namn, $descr, $pris, $target_file);
	$res->execute();
}
}
else
	{
	$str.=<<<FORM
		<form action="createProduct.php" method="post" enctype="multipart/form-data">
       	    <p><label for="name">Name:</label>
			<input type="text" id="name" name="name"></p>
			<p><label for="description">Description:</label>
			<input type="text" id="description" name="description"></p>
			<p><label for="price">Price:</label>
			<input type="text" id="price" name="price"></p>
			<p><label for="picture">Picture:</label>
			<input type="file" id="picture" name="picture"></p>
           	<p>
           	<input type="submit" value="Skapa produkt">
           	</p>
          	</form>
FORM;
	}
?>
<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Skapa produkt</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
  <body id="login">
    <div id="wrapper">
	  
	
     <?php
	  require "masthead.php";
	  require "meny.php";
	 ?>
	
      
		
	  <main>
		<section>
			<?php 
				echo "$str"; 
			?>
		</section>
		</main>

    </div>
			<?php
			require "footer.php";
			?>

	</body>
</html>
