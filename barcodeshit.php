<DOCTYPE=<html>
    <title>hello there</title>
    <h1>tester</h1>
</html>
<form method="POST">
    <input type="text" name="naam" placeholder="naam" required><br><br>
    <button type="submit">Bestel</button>
</form>
                    <?php
                    $row = $con->query("SELECT * FROM bacode");
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
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
                        <th class="groote">Aantal</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['naam'] ?></td>
                        <td><?php echo $row['barcode'] ?></td>
                        
                    </tr>
                    </tbody>