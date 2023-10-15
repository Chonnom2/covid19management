<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    $sql = "SELECT * FROM `covid-19`.`confirmed case` WHERE `RRN_confirmed` = '".$_GET['RRN_confirmed']."'";
    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['contract num']." 해당 번호의 환자가 없음!!"."<br>";
            echo "<br><a href = 'kuh.php'><--초기 화면</a>";
            exit();
        }
    }
    else{
        echo "데이터 조회 실패!!!","<br>";
        echo "실패 원인 :",mysqli_error($con);
        echo "<br><a href = 'kuh.php'><--초기 화면</a>";
        exit();
    }

   $row = mysqli_fetch_array($ret);
   $confirmed_num = $row['confirmed num'];
   $RRN_confirmed = $row["RRN_confirmed"];
   $room_num = $row["room num"];
   $hospitalization_date = $row["hospitalization date"];
   $discharge_date = $row["discharge date"];
   $death_date = $row["death date"];
   $severity = $row["severity"];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 환자 정보 삭제 </h1>
<FORM METHOD="post" ACTION="Kdeleteconfirmed_result.php">
   환자번호 : <INPUT TYPE ="text" NAME="confirmed num" VALUE=<?php echo $confirmed_num ?> READONLY><br>
   주민등록번호 : <INPUT TYPE ="text" NAME="RRN_confirmed" VALUE=<?php echo $RRN_confirmed ?> READONLY><br>
   병실번호 : <INPUT TYPE ="text" NAME="room num" VALUE=<?php echo $room_num READONLY?>><br>
   입원일 : <INPUT TYPE ="date" NAME="hospitalization date" VALUE=<?php echo $hospitalization_date ?>><br>
   퇴원일 : <INPUT TYPE ="date" NAME="discharge date" VALUE=<?php echo $discharge_date ?>><br>
   사망일 : <INPUT TYPE ="date" NAME="death date" VALUE=<?php echo $death_date ?>><br>
   증상 : <INPUT TYPE ="text" NAME="severity" VALUE=<?php echo $severity ?> ><br><br>
   <BR><BR>
    위 정보를 삭제하겠습니까?  
   <INPUT TYPE="submit" VALUE="삭제">
   <INPUT TYPE = "button" onclick="location.href='Kconfirmedcase_all.php'" VALUE = "취소">
</FORM>

</BODY>
</HTML>