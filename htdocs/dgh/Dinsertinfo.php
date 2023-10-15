<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

$sql ="SELECT * FROM `confirmed case`, `hospital room` WHERE '".$_POST["room_num"]."' = `hospital room`.`room num` AND `hospital room`.hospital_code='dgh'";
$ret = mysqli_query($con,$sql);

if($ret) {
   $count = mysqli_num_rows($ret);
   if($count==0) 
   {
      echo $_POST['room_num']."번 병실은 병원에 없습니다!!!"."<br>";
      echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
      exit();
   }
}
else {
   echo "데이터 조회 실패!!!"."<br>";
   echo "실패 원인 :".mysqli_error($con);
   echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
   exit();
}

$confirmed_num = $_POST["confirmed_num"];
$RRN_confirmed = $_POST["RRN_confirmed"];
$room_num = $_POST["room_num"];
$hospitalization_date = $_POST["hospitalization_date"];
$severity = $_POST["severity"];
$row = mysqli_fetch_array($ret);
$Current_num = $row['current number'];
$Capacity = $row['capacity'];

$sql = "SELECT * FROM `hospital room` WHERE `room num` = $room_num";
$ret = mysqli_query($con, $sql);
if(!$ret)
{
   echo "데이터 조회 실패!!!"."<br>";
   echo "실패 원인 :".mysqli_error($con);
   echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
   exit();
}
$row = mysqli_fetch_array($ret);
$type = $row['type'];

if($severity == 1 || $severity == 2)
   $dho = 0;
else
   $dho = 1;

if($type == "중환자실")
   $cho = 1;
else
   $cho = 0;
if($cho != $dho)
{
         echo "환자의 병실틀립니다!!!"."<br>";
         echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
         exit();
}

$Current_num = $Current_num + 1;
if($Current_num > $Capacity){
         echo "병실의 수용량을 초과합니다!!!"."<br>";
         echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
         exit();
}

$sql = " INSERT INTO `confirmed case` (`confirmed num`, `RRN_confirmed`, `room num`, `hospitalization date`, `severity`) VALUES ('".$confirmed_num."','".$RRN_confirmed."','".$room_num."','".$hospitalization_date."', '".$severity."')";
$ret = mysqli_query($con, $sql);

if(!$ret) {
	   echo "데이터 입력 실패bb!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
         echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
	exit();
   }

$sql ="UPDATE `hospital room` SET `current number` = `current number`+1 WHERE `room num` = $room_num";
$ret = mysqli_query($con,$sql);

    echo "<h1> 신규 환자 입력 결과 </h1>";
   if($ret) {
	   echo "데이터가 성공적으로 입력됨.";
      echo "<br><a href='dgh.php'><--메인 화면</a>";
   }
   else {
	   echo "데이터 입력 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
      echo "<br><a href='Dinsertconfirmed_case.php'><--이전 화면</a>";
	exit();
   } 
   mysqli_close($con);
?>
