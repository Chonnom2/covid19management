<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");


    if(!empty($_POST["plan_num"]))
    {
        $plannum = $_POST["plan_num"];
        $connum = $_POST["connum"];
        $sdate = $_POST["sdate"];
        $quantity = $_POST["quantity"];
        $plantcode = $_POST["plantcode"];
        $sql = "SELECT * FROM `plant` WHERE `plant code` = '$plantcode'";
        $ret = mysqli_query($con, $sql);
        if(!$ret){
            echo "데이터 조회 실패!!!","<br>";
            echo "실패원인 :",mysqli_error($con);
        }
        $row = mysqli_fetch_array($ret);
        if($row['company'] == '모더나')
        {
            echo "소유한 공장이 아닙니다!! <br><br>";
            echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";
            exit();
            
        }
        $sql = "SELECT COUNT(*) FROM `pfizer_prod` WHERE `plant_code`= '$plantcode'";
        $ret = mysqli_query($con, $sql);
        if(!$ret){
            echo "데이터 조회 실패!!!","<br>";
            echo "실패원인 :",mysqli_error($con);
        }
        $row = mysqli_fetch_array($ret);
        if($row['COUNT(*)'] != 0 )
        {
            echo "해당 공장은 가동중 입니다!! <br><br>";
            echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";
            exit();
            
        }

        $sql = "INSERT INTO `covid-19`.`production plan` (`plan num`, `contract_num`, `start date`, `quantity`, `plant_code`) 
        VALUES ($plannum, $connum, '$sdate', $quantity, '$plantcode')";
    }
    else
    {
        $plannum = $_POST["plan_num"];
        $connum = $_POST["connum"];
        $sdate = $_POST["sdate"];
        $quantity = $_POST["quantity"];
        $plantcode = $_POST["plantcode"];
        $sql = "SELECT * FROM `plant` WHERE `plant code` = '$plantcode'";
        $ret = mysqli_query($con, $sql);
        if(!$ret){
            echo "데이터 조회 실패!!!","<br>";
            echo "실패원인 :",mysqli_error($con);
        }
        $row = mysqli_fetch_array($ret);
        if($row['company'] == '모더나')
        {
            echo "소유한 공장이 아닙니다!! <br><br>";
            echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";
            exit();
            
        }
        $sql = "SELECT COUNT(*) FROM `pfizer_prod` WHERE `plant_code`= '$plantcode'";
        $ret = mysqli_query($con, $sql);
        if(!$ret){
            echo "데이터 조회 실패!!!","<br>";
            echo "실패원인 :",mysqli_error($con);
        }
        $row = mysqli_fetch_array($ret);
        if($row['COUNT(*)'] != 0 )
        {
            echo "해당 공장은 가동중 입니다!! <br><br>";
            echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";
            exit();
            
        }
        
        $sql = "INSERT INTO `covid-19`.`production plan` (`contract_num`, `start date`, `quantity`, `plant_code`) 
        VALUES ($connum, '$sdate', $quantity, '$plantcode')";   
    }
    $ret = mysqli_query($con,$sql);

    echo "<h1> 생산 계획 추가 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 추가됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";




?>