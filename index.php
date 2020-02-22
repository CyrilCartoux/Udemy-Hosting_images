<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>

	<body>
		
		<nav class="navbar navbar-light bg-light">
		  <a class="navbar-brand" href="http://localhost/Hebergeur%20Images/">
		    <img src="pin.svg" width="20" height="20" class="d-inline-block align-top" alt="">
		    Images Host
		  </a>
		</nav>
		<section>
			<?php 
			
				if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

					$error = 1;

					if ($_FILES['image']["size"] < 3000000) {
						
						$infosImage = pathinfo($_FILES["image"]["name"]);
						$imageExtension = $infosImage["extension"];
						$allowedExtensions = ['png', 'jpg', 'jpeg', 'gif'];

						if (in_array($imageExtension, $allowedExtensions)) {

							$uploadedImage = 'uploads/'.time().basename($_FILES['image']['name']);

								move_uploaded_file($_FILES['image']['tmp_name'], $uploadedImage);

								$error = 0;									
						}
					}
				} 

				echo '<form method="post" action="index.php" enctype="multipart/form-data">
					<p>
						<h1> Envoyez vos Fichiers </h1>
						<input type="FILE" name="image" /> <br> <br>
						<button type="submit"> Envoyer les fichiers </button>
					</p> ';
			
				if (isset($error) && $error === 0) {
					echo '<img src="' .$uploadedImage. '" id="image" />';
				
				echo '<br>';
				echo '<br>';
				echo '<br>';

				echo 'Télécharger votre image : <input type="text" id="image-download" value="http://localhost/Hebergeur%20Images/' .$uploadedImage. '" />';
				};
			?>

			
			
		</section>
		<footer>
			All Rights Reserved
		</footer>
		
	</body>

</html>