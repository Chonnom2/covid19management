<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    //$sql = "CALL warehouseselect('".$_GET['warehouse code']."','화이자')";
    $sql = "SELECT * FROM `covid-19`.`warehouse` WHERE `warehouse code` = '".$_GET['warehouse_code']."'";
    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['warehouse_code']." 해당 계약 넘버의 계약이 없음!!"."<br>";
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
    $warehousecode = $row['warehouse code'];
    $address = $row['address'];
    $phone = $row['phone'];
    $capa = $row['capacity'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 창고 정보 삭제 </h1>
<FORM METHOD="post" ACTION="pfizer_warehouse_delete_result.php">
    창고 코드 : <INPUT TYPE = "text" NAME = "warehouse_code" VALUE = <?php echo $warehousecode?> READONLY><br>
    창고 주소 : <INPUT TYPE = "text" NAME = "address" VALUE = <?php echo "'$address'"?> READONLY> <br>
    창고 연락처 : <INPUT TYPE = "text" NAME = "phone" VALUE = <?php echo $phone?> READONLY> <br>
    창고 용량 : <INPUT TYPE = "text" NAME = "capa" VALUE = <?php echo $capa?> READONLY> <br>
    <BR><BR>
    위 계약을 삭제하겠습니까?  
    <INPUT TYPE = "submit" VALUE = "삭제">
</FORM>

</BODY>
</HTML>

