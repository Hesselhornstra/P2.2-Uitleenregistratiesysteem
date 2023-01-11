<?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
$artikelen = $con->query("SELECT * FROM artikelen WHERE cate!='0' ORDER BY 1");
if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="icon" type="image/x-icon" href="/img/logo.png">
		<title>Barcodes - Uitleenregistratiesysteem</title>
		<script src="https://kit.fontawesome.com/3304b0f2b7.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="/css/barcodes.css">
	</head>
	<body>
		<div>
			<div class="alleartikelen">
				<?php while ($row = $artikelen->fetch_assoc()) { ?>
				<div class="artikel">
					<center>
						<?php require 'vendor/autoload.php'; $generator = new Picqer\Barcode\BarcodeGeneratorHTML(); ?>
						<a class="barcode"><?php echo $generator->getBarcode($row['barcode'], $generator::TYPE_CODE_128); ?></a>
						<a class="barcoden"><?php echo $row['barcode']; ?></a>
					</center>
				</div><?php } ?>
			</div>
		</div>
	</body>
</html>