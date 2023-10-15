<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    $sql = "SELECT * FROM `covid-19`.`inventory` WHERE `inventory_num` = '".$_GET['inventory_num']."'";

    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['inventory_num']." 해당 계약 넘버의 계약이 없음!!"."<br>";
            echo "<br><a href = 'main.html'><--초기 화면</a>";
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
    $inum = $row['inventory_num'];
    $lotnum = $row['lot number'];
    $warehouse = $row['warehouse_code'];
    $quantity = $row['quantity'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 백신 재고 정보 수정 </h1>
<FORM METHOD="post" ACTION="pfizer_inventory_update_result.php">
    재고번호 : <INPUT TYPE = "text" NAME = "inventory_num" VALUE = <?php echo $inum?> READONLY><br>
    로트번호 : <INPUT TYPE = "text" NAME = "lotnumber" VALUE = <?php echo $lotnum?>><br>
    창고코드 : <INPUT TYPE = "text" NAME = "warehouse_code" VALUE = <?php echo $warehouse?>> <br>
    수량 : <INPUT TYPE = "text" NAME = "quantity" VALUE = <?php echo $quantity?>> <br>
    <BR><BR>
    <INPUT TYPE = "submit" VALUE = "수정">
</FORM>

</BODY>
</HTML>

