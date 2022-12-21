<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
/*if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}*/
$tolate = $con->query("SELECT * FROM artikeluit WHERE datumin < CURRENT_DATE()");
$now = $con->query("SELECT * FROM artikeluit WHERE datumin = CURRENT_DATE()");
$out = $con->query("SELECT * FROM artikeluit WHERE datumin > CURRENT_DATE()");
$artnaam = $con->query("SELECT * FROM artikelen");
$categorieen = $con->query("SELECT * FROM categorieen");

?>
<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<title>Paneel - Uitleenregistratiesysteem</title>
	<link rel="stylesheet" href="/css/paneel.css">
	<script src="js/main.js" defer></script>
</head>

<body>
	<p class="grote">uitloggen</p>
	<hr>
	<center>
		<div class="grote">
			<table border='1'>
				<caption>Te laat</caption> </BR>
				<thead>
					<tr>
						<th>Naam</th>
						<th>Mail</th>
						<th>Datum</th>
						<th>Artikel</th>
						<th>Datum terug</th>
					</tr>
				</thead>

		</div>
		<?php
		while ($row = $tolate->fetch_assoc()) {
			$producttolate = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
			$producttolate = $producttolate->fetch_assoc()
		?>
			<tbody>
				<tr>
					<td><?= $row['naam'] ?></td>
					<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
					<td><?= $row['datumuit'] ?></td>
					<td><?= $producttolate['naam'] ?></td>
					<td><?= $row['datumin'] ?></td>
				</tr>
			</tbody>
		<?php
		}
		?>
		</table>
		</table>
	</center> <br><br><br><br>
	<hr>
	<<center>
		<div class="grote">
			<table border='1'>
				<caption>Vandaag inleveren</caption> </BR>
				<thead>
					<tr>
						<th>Naam</th>
						<th>Mail</th>
						<th>Datum</th>
						<th>Artikel</th>
						<th>Datum terug</th>
					</tr>
				</thead>
		</div>
		<?php
		while ($row = $now->fetch_assoc()) {
			$productnow = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
			$productnow = $productnow->fetch_assoc()
		?>
			<tbody>
				<tr>
					<td><?= $row['naam'] ?></td>
					<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
					<td><?= $row['datumuit'] ?></td>
					<td><?= $productnow['naam'] ?></td>
					<td><?= $row['datumin'] ?></td>
				</tr>
			</tbody>
		<?php
		}
		?>
		</table>
		</center> <br><br><br><br>
		<hr>
		<center>
			<div class="grote">
				<table border='1'>
					<caption>Momenteel uitgeleend</caption> </BR>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum</th>
							<th>Artikel</th>
							<th>Datum terug</th>
						</tr>
					</thead>
			</div>
			<?php
			while ($row = $out->fetch_assoc()) {
				$productout = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
				$productout = $productout->fetch_assoc()
			?>
				<tbody>
					<tr>
						<td><?= $row['naam'] ?></td>
						<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
						<td><?= $row['datumuit'] ?></td>
						<td><?= $productout['naam'] ?></td>
						<td><?= $row['datumin'] ?></td>

					</tr>
				</tbody>
			<?php
			}
			?>
			</table>
		</center> <br><br><br><br>
		<hr>
		<center>
			<caption>Toevoegen</caption>
			<table border=1>
				<thead>
					<tr>
						<th>Groep</th>
						<th>Naam artikel</th>
						<th>Info artikel</th>
						<th>Link foto</th>
					</tr>
				</thead>
		</center>
		<tbody>
			<td><select name="select" value="" onChange="form.submit()">
					<option value="">Selecteer een categorie</option>
					<?php while ($row = $categorieen->fetch_assoc()) { ?>
						<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
					<?php } ?>
				</select></td>
			<td><input type="text" required></td>
			<td><input type="text" required></td>
			<td><input type="text" required></td>
			<td><input type="submit" name="Verstuur" value="registreer"></td>
		</tbody>
		</form>
		</table>
		</div>
		<br>
		<center>

			<caption>Aanpassen</caption>
			<table border=1>
				<thead>
					<tr>
						<th>categorie</th>
						<th>Artikel</th>
						<th>Naam artikel</th>
						<th>Info artikel</th>
						<th>Link foto</th>
					</tr>
				</thead>
		</center>
		<tbody>
			<?php $categorieen = $con->query("SELECT * FROM categorieen"); ?>
			<td><select name="select" value="" onChange="form.submit()">
					<option value="">Selecteer een categorie</option>
					<?php while ($row = $categorieen->fetch_assoc()) { ?>
						<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
					<?php } ?>
				</select></td>
			<td>
				<select>
					<option value="">Selecteer een artikel</option>
					<?php while ($row = $artnaam->fetch_assoc()) { ?>
						<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
					<?php } ?>
				</select>
			</td>

			<td><input type="text" required></td>
			<td><input type="text" required></td>
			<td><input type="text" required></td>
			<td><input type="submit" name="Verstuur" value="registreer"></td>
		</tbody>
		</form>
		</table>
		</div>
		<br>
		<center>
			<caption>verwijderen</caption>
			<table border=1>
				<thead>
					<tr>
						<th>Artikel</th>
						<th>Naam artikel</th>
						<th>Info artikel</th>
						<th>Link foto</th>
					</tr>
				</thead>
		</center>
		<tbody>
			<td><select name="select" value="" onChange="form.submit()">
					<option value="">Selecteer een categorie</option>
					<?php while ($row = $artnaam->fetch_assoc()) { ?>
						<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
					<?php } ?>
				</select>
			</td>
			<td><input type="text" required></td>
			<td><input type="text" required></td>
			<td><input type="text" required></td>
			<td><input type="submit" name="Verstuur" value="registreer"></td>
		</tbody>
		</form>
		</table>
		</div>
</body>

</html>