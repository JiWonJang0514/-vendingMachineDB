<?php
$host = "localhost";
$dbname = "myblog";
$charset = "utf8mb4";
$user = "root";
$pass = "";

//DB접속
$db = new PDO("mysql:host={$host}; dbname={$dbname}; charset={$charset}", $user, $pass);

$drink = $_GET['drink'];
$totalMoney = $_GET['totalMoney'];

$sql = "SELECT name, price FROM machine WHERE id=$drink";
$result = $db->query($sql);
$list = $result->fetchAll(PDO::FETCH_OBJ);

foreach ($list as $item) {
    $name = $item->name;
    $price =  $item->price;
}

$change = $totalMoney - $price;

$sql = "UPDATE machine SET amount=amount-1 WHERE id=$drink";
$db->exec($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자판기</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>음료수와 거스름돈을 가져가세요</h2>
    <div class="container">
        <p id="result"><?php echo "{$name}({$price})"?></p>
        <p id="change">거스름돈: <?php echo $change ?>원</p>
    </div>

    <a href="index.php">처음으로</a>
</body>
</html>
