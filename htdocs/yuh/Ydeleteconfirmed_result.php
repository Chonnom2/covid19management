<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $confirmed_num = $_POST["confirmed_num"];
    $sql = "DELETE FROM `covid-19`.`confirmed case` WHERE `confirmed num` = $confirmed_num";
    
    $ret = mysqli_query($con, $sql);

    echo "<h1> 검사 정보 삭제 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 삭제됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'Yconfirmedcase_all.php'> <--이전화면 </a>";




?>