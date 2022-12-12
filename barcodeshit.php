<DOCTYPE=<html>
    <title>hello there</title>
    <h1>tester</h1>
</html>
<form method="POST">
    <input type="text" name="naam" placeholder="naam" required><br><br>
    <button type="submit">Bestel</button>
</form>
                    <?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
$bacode = $con->query("SELECT * FROM bacode");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$con->query("
    INSERT INTO
    bacode
    (
    naam
    ) VALUES
    (
    '".$con->real_escape_string($_POST['naam'])."'
    )
");
    }
?>
 <table border='1'>
                
                <thead>
                    <tr>
                        <th class="groote">naam</th>
                        <th class="groote">barcode</th>

                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $bacode->fetch_assoc()) {?>

                    <tr>
                        <td><?php echo $row['naam'] ?></td>
                        <td><?php echo $row['barcode'] ?></td>
                        
                    </tr>
                    <?php } ?>
                    </tbody>
                    <form action=“add-purchase.php" method="post">
    <input name=“productId" onmouseover="this.focus();" type="text">
</form>