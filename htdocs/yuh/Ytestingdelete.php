<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");
    $sql = "SELECT * FROM `covid-19`.`testing` WHERE `test num` = '".$_GET['test_num']."'";
    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count == 0){
            echo $_GET['contract num']." 해당 테스트번호의 환자가 없음!!"."<br>";
            echo "<br><a href = 'yuh.php'><--초기 화면</a>";
            exit();
        }
    }
    else{
        echo "데이터 조회 실패!!!","<br>";
        echo "실패 원인 :",mysqli_error($con);
        echo "<br><a href = 'yuh.php'><--초기 화면</a>";
        exit();
    }

    $row = mysqli_fetch_array($ret);
    $test_num = $row['test num'];
    $RRN_test = $row["RRN_test"];
    $test_result = $row["test result"];
    $test_date = $row["test date"];
    $imported_case = $row["imported case"]; 
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content = "text/html; charset=utf-8">
</HEAD>
<BODY>
<h1> 검사 정보 삭제 </h1>
<FORM METHOD="post" ACTION="Ytestingdelete_result.php">
   검사번호 : <INPUT TYPE ="text" NAME="test_num" VALUE=<?php echo $test_num ?> READONLY><br>
   주민등록번호 : <INPUT TYPE ="text" NAME="RRN_test" VALUE=<?php echo $RRN_test ?> READONLY><br>
   검사결과 : <INPUT TYPE ="text" NAME="test_result" VALUE=<?php echo $test_result ?> READONLY><br>
   검사일자 : <INPUT TYPE ="date" NAME="test_date" VALUE=<?php echo $test_date ?> READONLY><br>
   해외입국여부 : <INPUT TYPE ="text" NAME="imported_case" VALUE=<?php echo $imported_case ?> READONLY><br>
   <BR><BR>
    위 정보를 삭제하겠습니까?  
   <INPUT TYPE="submit" VALUE="삭제">
   <INPUT TYPE = "button" onclick="location.href='Ytesting_all.php'" VALUE = "취소">
   
</FORM>

</BODY>
</HTML>

