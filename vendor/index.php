<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}
$tolate = $con->query("SELECT * FROM artikeluit WHERE datumin < CURRENT_DATE()");
$today = $con->query("SELECT * FROM artikeluit WHERE datumin = CURRENT_DATE()");
$stilaway = $con->query("SELECT * FROM artikeluit WHERE datumin > CURRENT_DATE()");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if ($_POST['form'] == "artiktoe") {
		$con->query("INSERT INTO artikelen (naam, info, img, barcode, cate) VALUES ('".$_POST['naam']."', '".$_POST['info']."', '".$_POST['foto']."', '".$_POST['barcode']."', '".$_POST['select']."')");
		Header("Refresh:0");//Wip
	}
	if ($_POST['form'] == "artikaan") {
		//Wip
		Header("Refresh:0");
	}
    if ($_POST['form'] == "artikver") {
		$con->query("DELETE FROM artikelen WHERE id='".$_POST['select']."'");
		Header("Refresh:0");//Wip
	}
	if ($_POST['form'] == "atoevoegen") {
		$con->query("INSERT INTO users (name, password) VALUES ('".$_POST['nname']."', '".password_hash($_POST['npass'],PASSWORD_DEFAULT)."')");
		Header("Refresh:0");
	}
	if ($_POST['form'] == "aaanpassen") {
		$con->query("UPDATE users SET name = '".$_POST['nname']."', password = '".password_hash($_POST['npass'],PASSWORD_DEFAULT)."' WHERE id='".$_POST['select']."'");
		Header("Refresh:0");
	}
    if ($_POST['form'] == "averwijder") {
		$con->query("DELETE FROM users WHERE id='".$_POST['select']."'");
		Header("Refresh:0");
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
		<title>Paneel - Uitleenregistratiesysteem</title>
		<link rel="stylesheet" href="index.css">
		<script src="index.js" defer></script>
	</head>
	<body>
		<button class="uitlog" onclick="location.href = `/loguit`">Uitloggen</button>
		<button class="uitlog" onclick="location.href = `/`">Artikelen</button>
		<hr>
		<center>
			<h2>Artikelen</h2>
			<button class="knop" onclick="artikelen('telaat')">Te Laat</button>
			<button class="knop" onclick="artikelen('vandag')">Vandaag inleveren</button>
			<button class="knop" onclick="artikelen('moment')">Uitgeleend/Geplanned</button>
			<div class="grote" id="telaat">
				<?php if (!$tolate->num_rows == 0) {?>
				<table border='1'>
					<h3>Te laat</h3>
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
				<br><br><br>
			</div>
			<div class="grote" id="vandag">
				<?php if (!$today->num_rows == 0) {?>
				<table border='1'>
					<h3>Vandaag Inleveren</h3>
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
				<br><br><br>
			</div>
			<div class="grote" id="moment">
				<?php if (!$stilaway->num_rows == 0) {?>
				<table border='1'>
					<h3>Uitgeleend/Geplanned</h3>
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
				<br><br><br>
			</div>
			<br><hr>
			<h2>Artikel</h2>
			<button class="knop" onclick="artikel('toe')">Toevoegen</button>
			<button class="knop" onclick="artikel('wij')">Wijzigen</button>
			<button class="knop" onclick="artikel('ver')">Verwijderen</button>
			<div class="bord" id="toe">
				<form method="POST">
					<h3>Toevoegen</h3>
					<input type="hidden" name="form" value="artiktoe">
					<select name="select">
                        <option value="">Selecteer een categorie</option>
						<?php $categorie = $con->query("SELECT * FROM categorieen WHERE not id='0'");
						while ($row = $categorie->fetch_assoc()) { ?>
						<option value="<?= $row['naam'] ?>"><?= $row['naam'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="naam" placeholder="Naam" required>
					<input type="text" name="foto" placeholder="Foto" required>
					<input type="text" name="info" placeholder="Info" required>
					<input type="text" name="barcode" placeholder="Barcode" required>
					<button>Toevoegen</button>
				</form>
			</div>
			<div class="bord" id="wij">
				<form method="POST">
					<h3>Aanpassen</h3>
					<input type="hidden" name="form" value="artikaan">
					<select name="artikel" required>
                        <option value="">Selecteer een artikel</option>
						<?php $artikelcat = $con->query("SELECT * FROM artikelen WHERE not cate='0'");//Wip
						while ($row = $artikelcat->fetch_assoc()) { ?>
						<option value="<?= $row['naam'] ?>"><?= $row['naam'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="naam" placeholder="Naam" required>
					<input type="text" name="foto" placeholder="Foto" required>
					<input type="text" name="info" placeholder="Info" required>
					<input type="text" name="barcode" placeholder="Barcode" required>
					<button>Aanpassen</button>
				</form>
			</div>
			<div class="bord" id="ver">
				<form method="POST">
					<h3>Verwijderen</h3>
					<input type="hidden" name="form" value="artikver">
					<select name="artikel" required>
                        <option value="">Selecteer een artikel</option>
						<?php $artikelcat = $con->query("SELECT * FROM artikelen WHERE not cate='0'");//Wip
						while ($row = $artikelcat->fetch_assoc()) { ?>
						<option value="<?= $row['naam'] ?>"><?= $row['naam'] ?></option>
						<?php } ?>
					</select>
					<button>Verwijderen</button>
				</form>
			</div>
			<br><hr>
			<h2>Account</h2>
			<button class="knop" onclick="account('atoe')">Toevoegen</button>
			<button class="knop" onclick="account('aaan')">Aanpassen</button>
			<button class="knop" onclick="account('aver')">Verwijderen</button>
			<div id="atoe">
				<form method="POST">
					<h3>Toevoegen</h3>
					<input type="hidden" name="form" value="atoevoegen">
					<input type="text" name="nname" placeholder="Naam" required>
					<input type="password" name="npass" placeholder="Wachtwoord" required>
					<button>Toevoegen</button>
				</form>
			</div>
			<div id="aaan">
				<form method="POST">
					<h3>Aanpassen</h3>
					<input type="hidden" name="form" value="aaanpassen">
					<select name="select">
                        <option value="">Selecteer een gebruiker</option>
						<?php $accounts = $con->query("SELECT * FROM users");
						while ($row = $accounts->fetch_assoc()) { ?>
						<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="nname" placeholder="Nieuwe naam" required>
					<input type="password" name="npass" placeholder="Nieuwe wachtwoord" required>
					<button>Aanpassen</button>
				</form>
			</div>
			<div id="aver">
				<form method="POST">
					<h3>Verwijderen</h3>
					<input type="hidden" name="form" value="averwijder">
					<select name="select" required>
                        <option value="">Selecteer een gebruiker</option>
						<?php $accounts = $con->query("SELECT * FROM users");
						while ($row = $accounts->fetch_assoc()) { ?>
						<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
						<?php } ?>
					</select>
					<button>Verwijderen</button>
				</form>
			</div>
			<br><br><br>
		</center>
	</body>
</html>