<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}
$tolate = $con->query("SELECT * FROM artikeluit WHERE datumin < CURRENT_DATE()");
$today = $con->query("SELECT * FROM artikeluit WHERE datumin = CURRENT_DATE()");
$stilaway = $con->query("SELECT * FROM artikeluit WHERE datumin > CURRENT_DATE()");
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="icon" type="image/x-icon" href="/img/logo.png">
		<title>Paneel - Uitleenregistratiesysteem</title>
		<link rel="stylesheet" href="index.css">
		<script src="js/main.js" defer></script>
	</head>
	<body>
		<button class="uitlog" onclick="location.href = `/uitlog`">Uitloggen</button>
		<button class="uitlog" onclick="location.href = `/`">Artikelen</button>
		<hr>
		<center>
			<div class="grote">
				<?php if (!$tolate->num_rows == 0) {?>
				<table border='1'>
					<caption>Te laat</caption><br>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum uitleen</th>
							<th>Artikel</th>
							<th>Datum terug</th>
							<th>specificaties</th>
						</tr>
						<?php
                        while ($row = $tolate->fetch_assoc()) {
						$producttolate = $con->query("SELECT * FROM artikelen WHERE barcode='".$row['barcode']."'");
						$producttolate = $producttolate->fetch_assoc()
                        ?>
                        <tr>
                            <td><?= $row['naam'] ?></td>
                            <td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
                            <td><?= $row['datumuit']?></td>
                            <td><?= $producttolate['naam']?></td>
                            <td><?= $row['datumin']?></td>
                            <td><?= $producttolate['info']?></td>
                        </tr>
                        <?php 
                        }
                        ?>
					</thead>
				</table>
				<?php }else{ ?>
					<h3>Er zijn geen te laat ingeleverde artikelen</h3>
				<?php } ?>
			</div>
		</center><br><br><br><br>
		<hr>
		<center>
			<div class="grote">
				<?php if (!$today->num_rows == 0) {?>
				<table border='1'>
					<caption>Vandaag Inleveren</caption><br>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum uitleen</th>
							<th>Artikel</th>
							<th>Datum terug</th>
							<th>specificaties</th>
						</tr>
						<?php
                        while ($row = $today->fetch_assoc()) {
						$producttoday = $con->query("SELECT * FROM artikelen WHERE barcode='".$row['barcode']."'");
						$producttoday = $producttoday->fetch_assoc()
                        ?>
                        <tr>
                            <td><?= $row['naam'] ?></td>
                            <td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
                            <td><?= $row['datumuit'] ?></td>
                            <td><?= $producttoday['naam']?></td>
                            <td><?= $row['datumin']?></td>
                            <td><?= $producttoday['info']?></td>
                        </tr>
                        <?php 
                        }
                        ?>
					</thead>
				</table>
				<?php }else{ ?>
					<h3>Er zijn geen vandaag in te leverde artikelen</h3>
				<?php } ?>
			</div>
		</center><br><br><br><br>
		<hr>
		<center>
			<div class="grote">
				<?php if (!$stilaway->num_rows == 0) {?>
				<table border='1'>
					<caption>Uitgeleende artikelen</caption><br>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum uitleen</th>
							<th>Artikel</th>
							<th>Datum terug</th>
							<th>specificaties</th>
						</tr>
						<?php
                        while ($row = $stilaway->fetch_assoc()) {
						$productstil = $con->query("SELECT * FROM artikelen WHERE barcode='".$row['barcode']."'");
						$productstil = $productstil->fetch_assoc()
                        ?>
                        <tr>
                            <td><?= $row['naam'] ?></td>
                            <td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
                            <td><?= $row['datumuit'] ?></td>
                            <td><?= $productstil['naam']?></td>
                            <td><?= $row['datumin']?></td>
                            <td><?= $productstil['info']?></td>
                        </tr>
                        <?php 
                        }
                        ?>
					</thead>
				</table>
				<?php }else{ ?>
					<h3>Er zijn geen vandaag in te leverde artikelen</h3>
				<?php } ?>
			</div>
		</center><br><br><br><br>
		<hr>
		<center>
			<form action="post">
				<div class="bord">
					<br>
					<div>
						<a class="boxol">Groep</a>
						<a class="box">naam artikel</a>
						<a class="box">Info artikel</a>
						<a class="box">Foto artikel</a>
						<br>><button class="boxton">Toevoegen</button>
					</div>
					<br>
					<table class="tabl" border='1'>
						<tr>
							<th>Selecteer</th>
						</tr>
						<tr>
							<th>Laptops</th>
						</tr>
						<tr>
							<th>Tablets</th>
						</tr>
						<tr>
							<th>monitoren</th>
						</tr>
						<tr>
							<th>Camera's</th>
						</tr>
						<input class="txt" type="text">
						<input class="txt" type="text">
						<input class="txt" type="text">
					</table>
				</div>
		</center>
		<br>
		<center>
			<div class="bord">
				<br>
				<div>
					<a class="boxol">Groep</a>
					<a class="box">naam artikel</a>
					<a class="box">Info artikel</a>
					<a class="box">Foto artikel</a>
					<br><button class="boxton">Wijzigen</button>
				</div>
				<br>
				<table class="tabl" border='1'>
					<tr>
						<th>Selecteer</th>
					</tr>
					<tr>
						<th>Laptops</th>
					</tr>
					<tr>
						<th>Tablets</th>
					</tr>
					<tr>
						<th>monitoren</th>
					</tr>
					<tr>
						<th>Camera's</th>
					</tr>
					<input class="txt" type="text">
					<input class="txt" type="Text">
					<input class="txt" type="text">
				</table>
			</div>
		</center>
		<br>
		<center>
			<div class="bord">
				<br>
				<div>
					<a class="boxol">Groep</a>
					<a class="box">naam artikel</a>
					<a class="box">Info artikel</a>
					<a class="box">Foto artikel</a>
					<br><button class="boxton">Verwijderen</button>
				</div>
				<br>
				<table class="tabl" border='1'>
					<tr>
						<th>Selecteer</th>
					</tr>
					<tr>
						<th>Laptops</th>
					</tr>
					<tr>
						<th>Tablets</th>
					</tr>
					<tr>
						<th>monitoren</th>
					</tr>
					<tr>
						<th>Camera's</th>
					</tr>
					<input class="txt" type="text">
					<input class="txt" type="Text">
					<input class="txt" type="text">
				</table>
			</div>
		</center>
	</body>
</html>