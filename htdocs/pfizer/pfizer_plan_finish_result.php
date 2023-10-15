<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $lotnum = $_POST["lot_num"];
    $plannum = $_POST["plan_num"];
    $fdate = $_POST['fdate'];
    $quantity = $_POST['quantity'];
    $warehousecode = $_POST['warehousecode'];
    $plantcode = $_POST['plant_code'];

    $sql = "SELECT * FROM `warehouse_load` WHERE `warehouse code` = '$warehousecode'";
    $ret = mysqli_query($con, $sql);
    if(!$ret){
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
        exit();
    }
    $row = mysqli_fetch_array($ret);
    if($row["load quantity"] + $quantity > $row["capacity"])
    {
        echo "창고가 가득참!!" ,"<br><br>";
        echo "<br> <a href = 'pfizer_main.php'> <--메인화면 </a>";
        exit();
    }

    $sql = "UPDATE `covid-19`.`production plan` SET `finish date` = '$fdate' WHERE `plan num` = $plannum";
    $ret = mysqli_query($con,$sql);
    if(!$ret){
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
        exit();
    }
    
    
    $date = strtotime($fdate.'+6 months');
    $slife = date("Y-m-d", $date);

    $sql = "INSERT INTO `covid-19`.`vaccine information` (`lot num`, `shelf life`, `plan_num`, `prod_plant_code`, `company`)
            VALUE ('$lotnum', '$slife', '$plannum', '$plantcode', '화이자')";
    $ret = mysqli_query($con, $sql);
    if(!$ret){
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
        exit();
    }

    $sql = "INSERT INTO `covid-19`.`inventory` (`lot number`, `warehouse_code`, `quantity`) VALUE ('$lotnum', '$warehousecode', '$quantity')";
    $ret = mysqli_query($con, $sql);
    if(!$ret){
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
        exit();
    }

    echo "<h1> 수정 결과 </h1>";
    echo "<br> 생산완료 확정 성공";

    mysqli_close($con);
    echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";




?>