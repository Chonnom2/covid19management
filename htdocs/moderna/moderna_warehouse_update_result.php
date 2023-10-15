<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $warehousecode = $_POST["warehouse_code"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $capa = $_POST["capa"];

    $sql = "UPDATE `covid-19`.`warehouse` SET `address` = '$address' , `phone` = '$phone', 
            `capacity` = '$capa' WHERE `warehouse code`= '$warehousecode' ";
    
    $ret = mysqli_query($con,$sql);

    echo "<h1> 창고 정보 수정 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 수정됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'moderna_main.php'> <--초기화면 </a>";




?>