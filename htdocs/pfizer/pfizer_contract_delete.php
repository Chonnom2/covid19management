<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    //$sql = "CALL contractselect('".$_GET['contract_num']."','화이자')";
    $sql = "SELECT * FROM `covid-19`.`contract` WHERE `contract num` = '".$_GET['contract_num']."'";
    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['contract num']." 해당 계약 넘버의 계약이 없음!!"."<br>";
            echo "<br><a href = 'pfizer_main.php'><--초기 화면</a>";
            exit();
        }
    }
    else{
        echo "데이터 조회 실패!!!","<br>";
        echo "실패 원인 :",mysqli_error($con);
        echo "<br><a href='pfizer_main.php'><--초기화면</a>";
        exit();
    }

    $row = mysqli_fetch_array($ret);
    $connum = $row['contract num'];
    $date = $row['date'];
    $quantity = $row['quantity'];
    $unitprice = $row['unit price'];
    $duedate = $row['due date'];    
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 계약 정보 삭제 </h1>
<FORM METHOD="post" ACTION="pfizer_contract_delete_result.php">
    계약번호 : <INPUT TYPE = "text" NAME = "contract_num" VALUE = <?php echo $connum?> READONLY><br>
    계약일자 : <INPUT TYPE = "date" NAME = "date" VALUE = <?php echo $date?> READONLY> <br>
    수량 : <INPUT TYPE = "text" NAME = "quantity" VALUE = <?php echo $quantity?> READONLY> <br>
    단위 가격($) : <INPUT TYPE = "text" NAME = "unit_price" VALUE = <?php echo $unitprice?> READONLY> <br>
    납기 기한 : <INPUT TYPE = "date" NAME = "due_date" VALUE = <?php echo $duedate?> READONLY> <br>
    <BR><BR>
    위 계약을 삭제하겠습니까?  
    <INPUT TYPE = "submit" VALUE = "삭제">
</FORM>

</BODY>
</HTML>

