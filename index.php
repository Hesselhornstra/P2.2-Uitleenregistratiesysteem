<?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
$categorieen = $con->query("SELECT * FROM categorieen");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['form'] == "uitlenen") {
		$con->query("INSERT INTO artikeluit (
			barcode,
			naam,
			mail,
			datumuit,
			datumin,
			uitgedoor
			) VALUES (
			'".$con->real_escape_string($_POST['barcode'])."',
			'".$con->real_escape_string($_POST['naam'])."',
			'".$con->real_escape_string($_POST['mail'])."',
			'".$con->real_escape_string($_POST['datumge'])."',
			'".$con->real_escape_string($_POST['datumte'])."',
			'".$con->real_escape_string($_SESSION['name'])."')");
	}
}
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
		<script src="js/main.js" defer></script>
	</head>
	<body id="eateregg">
		<div>
			<?php if (isset($_SESSION['loggedin']) == true){ ?>
			<button class="eastereggbutton" id="eateregb" onclick="eateregg()"></button>
			<?php } ?>
			<form action="<?php $_SERVER["PHP_SELF"] ?>" method="GET">
				<input type="text" name="zoek" id="zoekinput" placeholder="Zoeken...">
			</form>
			<?php if (isset($_GET['categorie'])){
				$categorietitle = $con->query("SELECT * FROM categorieen where id='".$_GET['categorie']."'");
				$categorietitlerow = $categorietitle->fetch_assoc()
				?>
				<div class="catediv">
					<h1><?= $categorietitlerow['naam'] ?></h1>
					<button class="terug" onclick="terug()">Terug</button>
				</div>
			<?php }else{?><div class="catediv"><h1>Kies een categorie</h1></div><?php } ?>
			<div class="alleartikelen">
			<?php if (!isset($_GET['categorie'])){ ?>
				<?php while ($row = $categorieen->fetch_assoc()) { ?>
				<div class="artikel" onclick="categorie('<?= $row['id'] ?>')">
					<img src="<?= $row['img'] ?>" alt="<?= $row['naam'] ?>"><br>
					<a><?= $row['naam'] ?></a>
				</div>
				<?php }} else {
				$artikelen = $con->query("SELECT * FROM artikelen WHERE cate='".$_GET['categorie']."' ORDER BY barcode ASC");
				if (!$artikelen->num_rows == 0) {
					while ($row = $artikelen->fetch_assoc()) {
					$uitgeleend = $con->query("SELECT * FROM artikeluit WHERE barcode='".$row['barcode']."' AND datumuit <= CURRENT_DATE()");
					?>
					<div class="artikel" onclick="locatie('<?= $row['id'] ?>', <?= $row['barcode'] ?>)">
						<img src="<?= $row['img'] ?>" alt="<?= $row['naam'] ?>"><br>
						<a><?= $row['naam'] ?></a>
						<?php if (!$uitgeleend->num_rows == 0) {?>
							<div class="uitgeleend"><a>Uitgeleend</a></div>
						<?php }?>
					</div>
				<?php }} else {?><h1>Geen artikelen gevonden</h1><?php }} ?>
			</div>
			<?php if (isset($_GET['zoek'])){
				$artikel = $con->query("SELECT * FROM artikelen WHERE barcode='".$_GET['zoek']."'");
			if ($artikel->num_rows == 0) {echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Kon geen artikel vinden!</div>';}else{
				$artikelrow = $artikel->fetch_assoc()
			?>
			<div class="dartikel">
				<?php if (isset($_GET['categorie'])){ ?>
					<i class="fa-solid fa-x dsluit" onclick="categorie('<?=$_GET['categorie']?>')"></i>
				<?php }else{?><i class="fa-solid fa-x dsluit" onclick="terug()"></i><?php }?>
				<?php				
				$duitgeleend = $con->query("SELECT * FROM artikeluit WHERE barcode='".$artikelrow['barcode']."' AND datumuit <= CURRENT_DATE()");
				if (!$duitgeleend->num_rows == 0) {
					$duitgeleendrow = $duitgeleend->fetch_assoc(); ?>
					<div class="duitgeleend"><a>Uitgeleend</a></div>
					<div class="duitgeleenda"><a><?= date("d-m-Y", strtotime($duitgeleendrow['datumin'])) ?></a></div>
				<?php }?>
				<img src="<?= $artikelrow['img'] ?>" alt="<?= $artikelrow['naam'] ?>"><br>
				<a class="naam"><?= $artikelrow['naam'] ?></a>
				<a class="info"><?= $artikelrow['info'] ?></a>
				<div class="omhulsol">
				<?php require 'vendor/autoload.php'; $generator = new Picqer\Barcode\BarcodeGeneratorHTML(); ?>
				<a class="barcode"><?php echo $generator->getBarcode($artikelrow['barcode'], $generator::TYPE_CODE_128); ?></a>
				<a class="barcoden"><?php echo $artikelrow['barcode']; ?></a>
				</div>
				<?php if (isset($_SESSION['loggedin']) == true){ ?>
					<form method="POST" id="uitleenform">
						<input type="hidden" name="form" value="uitlenen">
						<input type="hidden" name="barcode" value="<?= $artikelrow['barcode'] ?>">
						<label>Naam:</label><br>
						<input type="text" name="naam" placeholder="Naam" required><br>
						<label>Mail:</label><br>
						<input type="mail" name="mail" placeholder="Email" required><br>
						<label>Datum uitleen:</label><br>
						<input type="date" name="datumge" placeholder="Datum geleend" onclick="this.showPicker();" value="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" required><br>
						<label>Datum Retourneer:</label><br>
						<input type="date" name="datumte" placeholder="Datum terug" onclick="this.showPicker();" value="<?= date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")+14, date("Y"))) ?>" min="<?= date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))) ?>" required><br><br>
						<button type="submit">Uitlenen</button>
					</form><br>

					<?php if (!$duitgeleend->num_rows == 0) { ?>
					<button class="retour" type="submit" onclick= "location.href =`/paneel/retourneer?barcode=<?= $artikelrow['barcode'] ?>`">retourneer</button>
					<?php } ?>
					<?php $artikelges = $con->query("SELECT * FROM artikelges WHERE barcode='".$_GET['zoek']."'"); ?>
					<div class="geschiedenis">
						<?php if (!$artikelges->num_rows == 0) { ?>
							<h1>Uitleen geschiedenis</h1>
							<center>
							<table border='1'>
								<thead>
									<tr>
										<th>Naam</th>
										<th>Mail</th>
										<th>Uitgeleend door</th>
										<th>Opmerking</th>
										<th>Ingenomen door</th>
									</tr>
								</thead>
								<?php while ($row = $artikelges->fetch_assoc()) { ?>
								<tbody>
									<tr>
										<td><?php echo $row['naam'] ?></td>
										<td><a href="mailto:<?php echo $row['mail'] ?>"><?php echo $row['mail'] ?></a></td>
										<td><?php echo $row['uitgedoor'] ?></td>
										<td><?php echo $row['opmerking'] ?></td>
										<td><?php echo $row['ingedoor'] ?></td>
									</tr>
								</tbody>
								<?php } } else { ?>
								<caption><strong>Er is geen geschiedenis voor dit artikel</strong></caption>
							</table>
							</center>
						<?php } ?>
				<?php } ?>
				</div>
			</div>
			<?php }} ?>
		</div>
	</body>
</html>