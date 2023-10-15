<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $plannum = $_POST["plan_num"];
    $connum = $_POST['connum'];
    $sdate = $_POST['sdate'];
    $fdate = $_POST['fdate'];
    $quantity = $_POST['quantity'];
    $plantcode = $_POST['plant_code'];
    $sql = "SELECT * FROM `plant` WHERE `plant code` = '$plantcode'";
    $ret = mysqli_query($con, $sql);
    if(!$ret){
        echo "데이터 조회 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }
    $row = mysqli_fetch_array($ret);
    if($row['company'] == '화이자')
    {
        echo "소유한 공장이 아닙니다!! <br><br>";
        echo "<br> <a href = 'moderna_main.php'> <--초기화면 </a>";
        exit();
        
    }
    $sql = "SELECT COUNT(*) FROM `moderna_plan` WHERE `plant_code`= '$plantcode'";
    $ret = mysqli_query($con, $sql);
    if(!$ret){
        echo "데이터 조회 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }
    $row = mysqli_fetch_array($ret);
    $running_plant = $row['COUNT(*)'];


    $sql = "SELECT * FROM `moderna_plan` WHERE `plan num`= $plannum";
    $ret = mysqli_query($con, $sql);
    if(!$ret){
        echo "데이터 조회 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }
    $row = mysqli_fetch_array($ret);

    if(($running_plant != 0) && ($row['plant_code'] != $plantcode))
    {
        echo "해당 공장은 가동중 입니다!! <br><br>";
        echo "<br> <a href = 'moderna_main.php'> <--초기화면 </a>";
        exit();
        
    }
    if(empty($fdate))
    {
        $sql = "UPDATE `covid-19`.`production plan` SET `contract_num` = $connum, `start date` = '$sdate', `quantity` = $quantity, `plant_code` = '$plantcode' WHERE `plan num` = $plannum";

    }
    else
    {
        $sql = "UPDATE `covid-19`.`production plan` SET `contract_num` = $connum, `start date` = '$sdate',  `finish date` = '$fdate', `quantity` = $quantity, `plant_code` = '$plantcode' WHERE `plan num` = $plannum";

    }
        
    $ret = mysqli_query($con,$sql);

    echo "<h1> 생산계획 수정 결과 </h1>";
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