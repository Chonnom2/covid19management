<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    $sql = "SELECT * FROM `covid-19`.`inventory` WHERE `inventory_num` = '".$_GET['inventory_num']."'";
    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['inventory_num']." 해당 재고 넘버의 재고가 없음!!"."<br>";
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
<h1> 재고 정보 삭제 </h1>
<FORM METHOD="post" ACTION="pfizer_inventory_delete_result.php">
    재고번호 : <INPUT TYPE = "text" NAME = "inventory_num" VALUE = <?php echo $inum?> READONLY><br>
    로트번호 : <INPUT TYPE = "text" NAME = "lotnumber" VALUE = <?php echo $lotnum?> READONLY><br>
    창고코드 : <INPUT TYPE = "text" NAME = "warehousecode" VALUE = <?php echo $warehouse?> READONLY> <br>
    수량 : <INPUT TYPE = "text" NAME = "quantity" VALUE = <?php echo $quantity?> READONLY> <br>
    <BR><BR>
    위 재고를 삭제하겠습니까?  
    <INPUT TYPE = "submit" VALUE = "삭제">
</FORM>

</BODY>
</HTML>

