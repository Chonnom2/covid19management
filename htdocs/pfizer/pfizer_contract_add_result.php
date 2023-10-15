<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

 
    if(!empty($_POST["contract_num"]))
    {
        $connum = $_POST["contract_num"];
        $date = $_POST["date"];
        $quantity = $_POST["quantity"];
        $uprice = $_POST["uprice"];
        $sup = "화이자";
        $ddate = $_POST["duedate"];
        $sql = "INSERT INTO `covid-19`.`contract` (`contract num`, `date`, `quantity`, `unit price`, `supplies`, `due date`) VALUES ($connum, '$date', $quantity, $uprice, '$sup', '$ddate')";
    }
    else
    {
        $date = $_POST["date"];
        $quantity = $_POST["quantity"];
        $uprice = $_POST["uprice"];
        $sup = "화이자";
        $ddate = $_POST["duedate"];
        $sql = "INSERT INTO `covid-19`.`contract`(`date`, `quantity`, `unit price`, `supplies`, `due date`) VALUES ('$date', $quantity, $uprice, '$sup', '$ddate')";
    }
    $ret = mysqli_query($con,$sql);

    echo "<h1> 계약 정보 추가 결과 </h1>";
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