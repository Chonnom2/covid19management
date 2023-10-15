<?php
$con=mysqli_connect("localhost","root","1234","covid-19") or die("MySQL 접속 실패!!");
$sql ="select *from `confirmed case`, `hospital room` where '".$_POST['room_num']."' = `hospital room`.`room num` AND `confirmed case`.`confirmed num` = '".$_POST['confirmed_num']."' AND `hospital room`.hospital_code='kbuh'";
$ret = mysqli_query($con,$sql);

if($ret) 
{
   $count = mysqli_num_rows($ret);
   if($count==0) 
   {   
      echo $_POST['room_num']."번 병실은 병원에 없습니다!!!"."<br>";
      echo "<br><a href='kuh.php'><--초기 화면</a>";
      exit();
   }
}
else 
{
   echo "데이터 조회 실패!!!"."<br>";
   echo "실패 원인 :".mysqli_error($con);
   echo "<br><a href='kuh.php'><--초기 화면</a> ";
   exit();
}

$sql ="SELECT * FROM `confirmed case` WHERE `confirmed num`='".$_POST['confirmed_num']."' ";

$confirmed_num = $_POST["confirmed_num"];
$RRN_confirmed = $_POST["RRN_confirmed"];
$room_num = $_POST["room_num"];
$hospitalization_date = $_POST["hospitalization_date"];
$discharge_date = $_POST["discharge_date"];
$death_date = $_POST["death_date"];
$severity = $_POST["severity"];

$ret = mysqli_query($con, $sql);
$row = mysqli_fetch_array($ret);
$Oldroom_num = $row['room num'];

if($hospitalization_date > $discharge_date && $discharge_date != NULL)
{
         echo "날짜가 잘못됐습니다!!!"."<br>";
         echo "<br><a href='kuh.php'><--초기 화면</a>";
         exit();
}
else if($hospitalization_date > $death_date && $death_date != NULL)
{
         echo "날짜가 잘못됐습니다!!!"."<br>";
         echo "<br><a href='kuh.php'><--초기 화면</a>";
         exit();
}
else if($discharge_date > $death_date && $death_date != NULL)
{
         echo "날짜가 잘못됐습니다!!!"."<br>";
         echo "<br><a href='kuh.php'><--초기 화면</a>";
         exit();
}


$sql = "SELECT * FROM `hospital room` WHERE `room num` = $room_num";
$ret = mysqli_query($con, $sql);
if(!$ret)
{
   echo "데이터 조회 실패!!!"."<br>";
   echo "실패 원인 :".mysqli_error($con);
   echo "<br><a href='Kinsertconfirmed_case.php'><--이전 화면</a>";
   exit();
}
$row = mysqli_fetch_array($ret);
$type = $row['type'];

if($severity ==1 || $severity ==2)
   $dho = 0;
else if($severity ==3)
   $dho = 1;
if($type == "중환자실")
   $cho = 1;
else
   $cho = 0;

if($cho != $dho)
{
         echo "환자의 병실틀립니다!!!"."<br>";
         echo "<br><a href='kuh.php'><--초기 화면</a>";
         exit();
}

if(empty($discharge_date))
{
   if(empty($death_date))
   {
      $b = 0;
   }
   else
      $b = 1;
}
else if(empty($death_date))
{
   $b = 2;
}
else
   $b = 3;

if($ret)
{
  switch($b)
  {
      case 0:
	      $sql ="select * from `confirmed case`, `hospital room` where '".$_POST["room_num"]."' = `hospital room`.`room num` AND `hospital room`.hospital_code='kbuh'";
      	$ret = mysqli_query($con,$sql);
	      $row = mysqli_fetch_array($ret);
	      $Current_num = $row['current number'];
	      $Capacity = $row['capacity'];
      	$Current_num = $Current_num + 1;
	      if($Current_num > $Capacity)
         {
         	echo "병실의 수용량을 초과합니다!!!"."<br>";
    		   echo "<br><a href='kuh.php'><--초기 화면</a>";
     		   exit();
      	}

	      $sql ="UPDATE `hospital room` SET `current number` = `current number`-1 WHERE `room num` = $Oldroom_num";
      	$ret = mysqli_query($con,$sql);
	      if(!$ret) 
         {
		      echo "데이터 수정 실패!!!aa"."<br>";
		      echo "실패 원인 :".mysqli_error($con);
      	}

      	$sql ="UPDATE `hospital room` SET `current number` = `current number`+1 WHERE `room num` = $room_num";
	      $ret = mysqli_query($con,$sql);
	      if(!$ret) 
         {
		      echo "데이터 수정 실패!!!bb"."<br>";
		      echo "실패 원인 :".mysqli_error($con);
	      }

         $sql ="UPDATE `confirmed case` SET RRN_confirmed='$RRN_confirmed' , `room num`  = $room_num, `hospitalization date` = '$hospitalization_date', `severity` = $severity WHERE `confirmed num` = $confirmed_num";
         break;
      case 1:
         if($row["death date"] == NULL)
         {
            $sql ="UPDATE `hospital room` SET `current number` = `current number`-1 WHERE `room num` = $Oldroom_num";
            $ret = mysqli_query($con, $sql);
         }
         $sql ="UPDATE `confirmed case` SET RRN_confirmed='$RRN_confirmed' , `room num`  = $room_num, `hospitalization date` = '$hospitalization_date', `death date` = '$death_date', `severity` = $severity WHERE `confirmed num` = $confirmed_num";
         break;
      case 2:
         if($row["discharge date"] == NULL)
         {
            $sql ="UPDATE `hospital room` SET `current number` = `current number`-1 WHERE `room num` = $Oldroom_num";
            $ret = mysqli_query($con, $sql);
         }
         $sql ="UPDATE `confirmed case` SET RRN_confirmed='$RRN_confirmed' , `room num`  = $room_num, `hospitalization date` = '$hospitalization_date', `discharge date` = '$discharge_date', `severity` = $severity WHERE `confirmed num` = $confirmed_num";
         break;      
      case 3:
	   if($row["discharge date"] == NULL && $row["death date"] == NULL)
         {
            $sql ="UPDATE `hospital room` SET `current number` = `current number`-1 WHERE `room num` = $Oldroom_num";
            $ret = mysqli_query($con, $sql);
         }
         $sql ="UPDATE `confirmed case` SET RRN_confirmed='$RRN_confirmed' , `room num`  = $room_num, `hospitalization date` = '$hospitalization_date', `discharge date` = '$discharge_date', `death date` = '$death_date', `severity` = $severity WHERE `confirmed num` = $confirmed_num";
         break;  
  }
  $ret = mysqli_query($con, $sql);
  if(!$ret) 
  {
      echo "데이터 수정 실패!!!aa"."<br>";
      echo "실패 원인 :".mysqli_error($con);
   }
}


echo "<h1> 회원 정보 수정 결과 </h1>";
if($ret) 
{
   echo "데이터가 성공적으로 수정됨. ";
}
else 
{
   echo "데이터 수정 실패!!!"."<br>";
   echo "실패 원인 :".mysqli_error($con);
}
mysqli_close($con);

echo "<br><a href='kuh.php'><--초기 화면</a> ";
?>