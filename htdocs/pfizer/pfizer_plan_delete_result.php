<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $plannum = $_POST["plan_num"];


    $sql = "DELETE FROM `covid-19`.`production plan` WHERE `plan num` = '".$plannum."' ";
    
    $ret = mysqli_query($con,$sql);

    echo "<h1> 계약 정보 삭제 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 삭제됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'pfizer_main.php'> <--초기화면 </a>";




?>