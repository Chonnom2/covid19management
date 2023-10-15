<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $inum = $_POST["inventory_num"];
    $lotnum = $_POST["lotnumber"];
    $warehouse = $_POST["warehouse_code"];
    $quantity = $_POST["quantity"];

    $sql = "UPDATE `covid-19`.`inventory` SET `lot number` = '".$lotnum."' , 
        `warehouse_code` = '".$warehouse."',  `quantity` = '".$quantity."' WHERE `inventory_num` = '".$inum."' ";
    
    
    $ret = mysqli_query($con,$sql);
    
    echo "<h1> 재고 정보 수정 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 수정됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";




?>