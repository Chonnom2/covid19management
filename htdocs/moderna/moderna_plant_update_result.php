<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $plantcode = $_POST["plant_code"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $dpc = $_POST["dpc"];

    $sql = "UPDATE `covid-19`.`plant` SET `address` = '$address' , `phone` = '$phone', 
            `daily production capacity` = '$dpc' WHERE `plant code`= '$plantcode' ";
    
    $ret = mysqli_query($con,$sql);

    echo "<h1> 공장 정보 수정 결과 </h1>";
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