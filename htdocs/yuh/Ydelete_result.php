<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패!!");
   $confirmed_num = $_POST["confirmed_num"];
   $sql ="SELECT * FROM `confirmed case` WHERE `confirmed num`= '$confirmed_num'";
   $ret = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($ret);

   $room_num = $row["room num"];
   if($row["discharge date"]==NULL && $row["death date"]==NULL)
   {
      $sql ="UPDATE `hospital room` SET `current number` = `current number`- 1 WHERE `room num` = $room_num";
      $ret = mysqli_query($con,$sql);
   }
   $sql ="DELETE FROM `confirmed case` WHERE `confirmed num`='".$confirmed_num."'";

   $ret = mysqli_query($con, $sql);

if(!$ret) {
	   echo "데이터 입력 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   }


   echo "<h1> 환자 삭제 결과 </h1>";
   if($ret) {
      echo $confirmed_num." 환자가 성공적으로 삭제됨..";
   }
   else {
      echo "데이터 삭제 실패!!!."."<br>";
      echo "실패 원인 : ".mysqli_error($con);
   }
   mysqli_close($con);

   echo "<br><br> <a href='yuh.php'><--초기 화면</a>";
?>