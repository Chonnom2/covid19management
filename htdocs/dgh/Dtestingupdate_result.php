<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $test_num = $_POST['test_num'];
    $RRN_test = $_POST["RRN_test"];
    $test_result = $_POST["test_result"];
    $test_date = $_POST["test_date"];
    $imported_case = $_POST["imported_case"];

    $sql = "UPDATE `covid-19`.`testing` SET `RRN_test` = '$RRN_test', `test result` = $test_result, `test date` = '$test_date', `imported case` = '$imported_case' WHERE `test num` = $test_num";
    $ret = mysqli_query($con,$sql);

    echo "<h1> 검사 정보 수정 결과 </h1>";
    if($ret){
        echo "데이터가 성공적으로 수정됨";
    }
    else {
        echo "데이터 수정 실패!!!","<br>";
        echo "실패원인 :",mysqli_error($con);
    }

    mysqli_close($con);

    echo "<br> <a href = 'Dtesting_all.php'> <--이전화면 </a>";




?>