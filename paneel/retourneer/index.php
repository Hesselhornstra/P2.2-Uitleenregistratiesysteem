<?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}
if (!isset($_GET['barcode'])){
	echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Er is iets fout gegaan probeer later op nieuw.</div>';
}
if (isset($_GET['barcode'])){
	$retour = $con->query("SELECT * FROM artikeluit WHERE barcode='".$_GET['barcode']."'");
	$retourrow = $retour->fetch_assoc();
	$retourinfo = $con->query("SELECT * FROM artikelen WHERE barcode='".$_GET['barcode']."'");
	$retourinforow = $retourinfo->fetch_assoc();
	$retourges = $con->query("SELECT * FROM artikelges WHERE barcode='".$_GET['barcode']."'");
}
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="icon" type="image/x-icon" href="/img/logo.png">
		<title>Retourneer - Uitleenregistratiesysteem</title>
		<script src="https://kit.fontawesome.com/3304b0f2b7.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="/css/retourneer.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	</head>
	<body>
		<button class="paneel" onclick="location.href = `/paneel`">Paneel</button>
		<hr>
		<div class="dartikel">
			<?php if (isset($_GET['barcode'])){ if ($retour->num_rows == 0) {echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Kon geen artikel vinden!</div>';}else{ ?>
			<img src="<?= $retourinforow['img'] ?>" alt="<?= $retourrow['naam'] ?>"><br>
			<a class="naam"><?= $retourrow['naam'] ?></a>
			<a class="info"><br>Datum uit geleend:<br><?= $retourrow['datumuit'] ?><br><br><br>Datum terug verwacht:<br><?= $retourrow['datumin'] ?></a>
			<textarea class="opmerking" placeholder="opmerking" required="required"></textarea>
			<div class="omhulsol">
			<?php require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; $generator = new Picqer\Barcode\BarcodeGeneratorHTML(); ?>
			<a class="barcode"><?php echo $generator->getBarcode($retourrow['barcode'], $generator::TYPE_CODE_128); ?></a>
			<a class="barcoden"><?php echo $retourrow['barcode']; ?></a>
			</div>
			<div class="geschiedenis">
				<?php if (!$retourges->num_rows == 0) { ?>
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
						<?php while ($retourgesrow = $retourges->fetch_assoc()) { ?>
						<tbody>
							<tr>
								<td><?php echo $retourgesrow['naam'] ?></td>
								<td><a href="mailto:<?php echo $retourgesrow['mail'] ?>"><?php echo $retourgesrow['mail'] ?></a></td>
								<td><?php echo $retourgesrow['uitgedoor'] ?></td>
								<td><?php echo $retourgesrow['opmerking'] ?></td>
								<td><?php echo $retourgesrow['ingedoor'] ?></td>
							</tr>
						</tbody>
						<?php } } else { ?>
						<caption><strong>Er is geen geschiedenis voor dit artikel</strong></caption>
					</table>
					</center>
				<?php } ?>
			</div>
			<?php }} ?>
		</div>
	</body>
</html>