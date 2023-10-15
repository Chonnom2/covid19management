<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    $sql = "SELECT * FROM `covid-19`.`plant` WHERE `plant code` = '".$_GET['plant_code']."'";

    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['plant code']." 해당 계약 넘버의 계약이 없음!!"."<br>";
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
    $plantcode = $row['plant code'];
    $address = $row['address'];
    $phone = $row['phone'];
    $dpc = $row['daily production capacity'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 공장 정보 수정 </h1>
<FORM METHOD="post" ACTION="pfizer_plant_update_result.php">
    공장코드 : <INPUT TYPE = "text" NAME = "plant_code" VALUE = <?php echo $plantcode?> READONLY><br>
    공장 주소 : <INPUT TYPE = "text" NAME = "address" VALUE = <?php echo "'$address'"?>> <br>
    공장 연락처 : <INPUT TYPE = "text" NAME = "phone" VALUE = <?php echo $phone?>> <br>
    일일 생산량 : <INPUT TYPE = "text" NAME = "dpc" VALUE = <?php echo $dpc?>> <br>
    <BR><BR>
    <INPUT TYPE = "submit" VALUE = "수정">
</FORM>

</BODY>
</HTML>

