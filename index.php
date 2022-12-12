<?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
$artikelen = $con->query("SELECT * FROM artikelen");
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="icon" type="image/x-icon" href="img/logo.png">
		<title>Home - Uitleenregistratiesysteem</title>
		<script src="https://kit.fontawesome.com/3304b0f2b7.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="js/zoek.js" defer></script>
	</head>
	<body>
		<div>
			<form action="<?php $_SERVER["PHP_SELF"] ?>" method="GET">
				<input type="text" name="zoek" id="zoekinput" placeholder="Zoeken...">
			</form>
			<div class="alleartikelen">
				<?php
				while ($row = $artikelen->fetch_assoc()) {
				?>
				<div class="artikel" onclick="locatie(<?= $row['id'] ?>)">
					<img src="<?= $row['img'] ?>"><br>
					<a><?= $row['naam'] ?></a>
				</div>
				<?php } ?>
			</div>
			<?php if (isset($_GET['id'])){
				$artikel = $con->query("SELECT * FROM artikelen WHERE id='".$_GET['id']."'");
			?>
			<div class="dartikel">
				<i class="fa-solid fa-x dsluit" onclick="dsluiten()"></i>
				<?php while ($row = $artikel->fetch_assoc()) { ?>
				<img src="<?= $row['img'] ?>"><br>
				<a><?= $row['naam'] ?></a>
				<a></a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</body>
</html>