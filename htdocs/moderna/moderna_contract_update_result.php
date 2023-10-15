<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $connum = $_POST["contract_num"];
    $date = $_POST["date"];
    $quantity = $_POST["quantity"];
    $unitprice = $_POST["unit_price"];
    $duedate = $_POST["due_date"];    

    $sql = "UPDATE `covid-19`.`contract` SET `date` = '".$date."' , `quantity` = '".$quantity."', `unit price` = '".$unitprice;
    $sql = $sql."', `due date` = '".$duedate."' WHERE `contract num` = '".$connum."' ";
    
    $ret = mysqli_query($con,$sql);

    echo "<h1> 계약 정보 수정 결과 </h1>";
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