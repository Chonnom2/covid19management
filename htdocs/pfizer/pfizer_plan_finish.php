<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

    $sql = "SELECT * FROM `covid-19`.`production plan` WHERE `plan num` = '".$_GET['plan_num']."'";
    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['plan_num']." 해당 생산 넘버의 계약이 없음!!"."<br>";
            echo "<br><a href = 'pfizer_main.html'><--초기 화면</a>";
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
    if(!empty($row['finish date']))
    {
        echo "이미 생산 완료 됨!!!!","<br>";
        echo "<br><a href='pfizer_main.php'><--초기화면</a>";
        exit();
    }

    
    $plannum = $row['plan num'];
    $connum = $row['contract_num'];
    $sdate = $row['start date'];
    $quantity = $row['quantity'];
    $plantcode = $row['plant_code']
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 생산 완료 확정 </h1>
<FORM METHOD="post" ACTION="pfizer_plan_finish_result.php">
    로트 번호 : <INPUT TYPE = "text" NAME = "lot_num" ><br>
    생산계획 번호 : <INPUT TYPE = "text" NAME = "plan_num" VALUE = <?php echo $plannum?> READONLY><br>
    계약 번호 : <INPUT TYPE = "text" NAME = "connum" VALUE = <?php echo $connum?> READONLY> <br>
    시작 일자 : <INPUT TYPE = "date" NAME = "sdate" VALUE = <?php echo $sdate?> READONLY> <br>
    종료 일자 : <INPUT TYPE = "date" NAME = "fdate"> <br>
    보관 창고 : <INPUT TYPE = "text" NAME = "warehousecode"> <br>
    수량 : <INPUT TYPE = "text" NAME = "quantity" VALUE = <?php echo $quantity?> READONLY> <br>
    공장 코드 : <INPUT TYPE = "text" NAME = "plant_code" VALUE = <?php echo $plantcode?> READONLY> <br>
    <BR><BR>
    <INPUT TYPE = "submit" VALUE = "확인">
</FORM>

</BODY>
</HTML>
