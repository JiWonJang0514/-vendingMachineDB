<?php
$host = "localhost";
$dbname = "myblog";
$charset = "utf8mb4";
$user = "root";
$pass = "";

//DB접속
$db = new PDO("mysql:host={$host}; dbname={$dbname}; charset={$charset}", $user, $pass);

$drinkList = array('이프로'=>2000, '포카리스웨트'=>1800, '게토레이'=>2000, '펩시콜라'=>1400, 
                    '코카콜라'=>1500, '스프라이트'=>2000, '삼다수'=>800, '하늘보리'=>1000);

$i = 1;
foreach ($drinkList as $key => $value) {
    //레코드 추가
    $sql = "INSERT INTO machine(`id`, `name`, `amount`, `price`)
    VALUES('$i', '$key', 5, $value)";
    $db->exec($sql);

    $i++;
}


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
    <h1>자판기</h1>
    
    <h2>프로그램 안내</h2>
    <div class="container">    
        <ol>
            <li>넣을 돈의 개수를 입력합니다.</li>
            <li>가능한 음료수 목록을 보고 원하는 음료수 번호를 선택합니다.</li>
            <li>음료수와 거스름돈이 나옵니다.</li>
        </ol>    
    </div>

    <h2>음료수</h2>
    <div class="container">
        <ul>
            <li>1. 이프로(2000)</li>
            <li>2. 포카리스웨트(1800)</li>
            <li>3. 게토레이(2000)</li>
            <li>4. 펩시콜라(1400)</li>
            <li>5. 코카콜라(1500)</li>
            <li>6. 스프라이트(2000)</li>
            <li>7. 삼다수(800)</li>
            <li>8. 하늘보리(1000)</li>
        </ul>
    </div>
    
    
    <h2>지폐/동전 투입구</h2>
    <div class="container">
        <form id="money" action="money_action.php" method="get">
            <div>
                <label for="thousand">1000원</label>
                <input type='text' id='thousand' name='thousand'>   
            </div>
            
            <div>
                <label for="fiveHund">500원</label>
                <input type='text' id='fiveHund' name='fiveHund'>
            </div>
            
            <div>
                <label for="oneHund">100원</label>
                <input type='text' id='oneHund' name='oneHund'>
            </div>
    
            <input type="submit" value="전송">
        </form>
    </div>
    
</body>
</html>