<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

 
    if(!empty($_POST["inventory_num"]))
    {
        $inum = (INT)$_POST["inventory_num"];
        $lotnum = $_POST["lotnumber"];
        $warehouse = $_POST["warehouse_code"];
        $quantity = (int)$_POST["quantity"];
        $sql = "INSERT INTO `covid-19`.`inventory` (`inventory_num`, `lot number`, `warehouse_code`, `quantity`) VALUES ('".$inum."', '".$lotnum."', '".$warehouse."', '".$quantity."')";
    }
    else
    {
        $lotnum = $_POST["lotnumber"];
        $warehouse = $_POST["warehouse_code"];
        $quantity = (int)$_POST["quantity"];
        $sql = "INSERT INTO `covid-19`.`inventory` (`lot number`, `warehouse_code`, `quantity`) VALUES ('".$lotnum."', '".$warehouse."', '".$quantity."')";
    }
    $ret = mysqli_query($con,$sql);

    echo "<h1> 계약 정보 추가 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 추가됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'moderna_main.php'> <--초기화면 </a>";




?>