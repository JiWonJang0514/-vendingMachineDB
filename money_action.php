<?php
$host = "localhost";
$dbname = "myblog";
$charset = "utf8mb4"; 
$user = "root";
$pass = "";

//DB접속
$db = new PDO("mysql:host={$host}; dbname={$dbname}; charset={$charset}", $user, $pass);


//돈을 투입
$thousand = $_GET['thousand'];
$fiveHund = $_GET['fiveHund'];
$oneHund = $_GET['oneHund'];

//돈을 안넣었을 경우
if ($thousand == "")
{
    $thousand = 0;
}
if ($fiveHund == "")
{
    $fiveHund = 0;
}
if ($oneHund == "")
{
    $oneHund = 0;
}

//투입금액 합계
$totalMoney = ($thousand*1000) + ($fiveHund*500) + ($oneHund*100);
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
    <form id="choice" action="choice_action.php">
        <h2>가능한 음료수</h2>
        <div class="container">
            <ul>
                <?php 
                    //투입한 돈으로 살 수 있는 음료수 리스트업

                    $sql = "SELECT id, name, amount, price FROM machine";
                    $result = $db->query($sql);
                    $list = $result->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($list as $item) {
                        //수량이 없는 음료 제외
                        if ($item->price <= $totalMoney && $item->amount > 0) {
                            echo "<li>{$item->id}. {$item->name}({$item->price})</li>";
                        }
                    }
                ?>
            </ul>
        </div>

        <div class="container">
            <p>투입한 금액: <?php echo $totalMoney ?></p>
            <input type="hidden" name="totalMoney" value=<?= $totalMoney ?>>

            <label for="drink">선택할 음료 번호:</label>
            <input type="text" id="drink" name="drink"> 

            <input type="submit" value="전송">
        </div>
    </form>
    
</body>
</html>
