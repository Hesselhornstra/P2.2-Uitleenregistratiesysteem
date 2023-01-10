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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['form'] == "retour") {
		$con->query("INSERT INTO artikelges (
			barcode,
			naam,
			mail,
			uitgedoor,
			opmerking,
			ingedoor
			) VALUES (
			'".$con->real_escape_string($_GET['barcode'])."',
			'".$con->real_escape_string($_POST['naam'])."',
			'".$con->real_escape_string($_POST['mail'])."',
			'".$con->real_escape_string($_POST['uitgedoor'])."',
			'".$con->real_escape_string($_POST['opmerking'])."',
			'".$con->real_escape_string($_SESSION['name'])."')");
		$con->query("DELETE FROM artikeluit WHERE barcode='".$_GET['barcode']."'");
		Header("Location: /paneel");
	}
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
			<form method="POST">
				<input type="hidden" name="form" value="retour">
				<input type="hidden" name="naam" value="<?= $retourrow['naam'] ?>">
				<input type="hidden" name="mail" value="<?= $retourrow['mail'] ?>">
				<input type="hidden" name="uitgedoor" value="<?= $retourrow['uitgedoor'] ?>">
				<textarea class="opmerking" name="opmerking" placeholder="opmerking" required="required"></textarea>
				<button class="retour" type="submit"> retour nemen</button>
			</form>
			<a class="info"><br>Datum uit geleend:<br><?= date("d-m-Y", strtotime($retourrow['datumuit'])) ?><br><br><br>Datum terug verwacht:<br><?= date("d-m-Y", strtotime($retourrow['datumin'])) ?></a>
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