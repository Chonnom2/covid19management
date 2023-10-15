<?php
   $con = mysqli_connect("localhost","root","1234","covid-19")or die("MySQL 접속 실패!!");

   if(empty($_GET["name"]))
   {
      if(empty($_GET['RRN_confirmed']))
      {
         echo "정보를 입력해주세요 !! <br><br> <a href='yuh.php'><--초기 화면</a>";
         exit(0);
      }
      else
      {
         $RRN = $_GET["RRN_confirmed"];
         $sql = "SELECT * FROM `covid-19`.`citizen` JOIN `covid-19`.`confirmed case` ON `citizen`.`RRN` = `confirmed case`.`RRN_confirmed` WHERE `RRN` = '$RRN'";
      }
   }
   else
   {
      if(empty($_GET['RRN_confirmed']))
      {
         $name = $_GET["name"];
         $sql = "SELECT * FROM `covid-19`.`citizen` JOIN `covid-19`.`confirmed case` ON `citizen`.`RRN` = `confirmed case`.`RRN_confirmed` WHERE `name` = '$name'";
      }
      else
      {
         $name = $_GET["name"];
         $RRN = $_GET["RRN_confirmed"];
         $sql = "SELECT * FROM `covid-19`.`citizen` JOIN `covid-19`.`confirmed case` ON `citizen`.`RRN` = `confirmed case`.`RRN_confirmed` WHERE `name` = '$name' AND `RRN` = '$RRN'";
      }
   }
  
   $ret = mysqli_query($con, $sql);
   if($ret){
      $count = mysqli_num_rows($ret);
   }
   else{
      echo "confirmedcase 데이터 조회 실패!!!","<br>";
      echo "실패 원인 : ".mysqli_error($con);
      exit();
   }
   mysqli_close($con);
   echo"<h1> 환자 정보 조회 </h1>";
   echo"<TABLE border=1>";
   echo"<TR>";
   echo"<TH>확진자 번호</TH><TH>이름</TH><TH>주민등록번호</TH><TH>병실번호</TH><TH>입원일</TH><TH>퇴원일</TH>";
   echo"<TH>사망일</TH><TH>구분</TH><TH>수정</TH><TH>삭제</TH>";
   echo"</TH>";
   while($row = mysqli_fetch_array($ret)){
      echo"<TR>";
      echo"<TD>",$row['confirmed num'],"</TD>";
	   echo"<TD>",$row['name'],"</TD>";
      echo"<TD>",$row['RRN_confirmed'],"</TD>";
      echo"<TD>",$row['room num'],"</TD>";
      echo"<TD>",$row['hospitalization date'],"</TD>";
      echo "<TD>", $row['discharge date'], "</TD>";
      echo "<TD>", $row['death date'], "</TD>";
      if($row['severity'] == 1)
         echo "<TD>", "무증상", "</TD>";
      if($row['severity'] == 2)
         echo "<TD>", "일반환자", "</TD>";
      if($row['severity'] == 3)
         echo "<TD>", "중환자", "</TD>";
      echo "<TD><a href='Yupdateconfirmed.php?RRN_confirmed=".$row['RRN_confirmed']."'>수정</a></TD>";
      echo "<TD><a href='Ydeleteconfirmed.php?RRN_confirmed=".$row['RRN_confirmed']."'>삭제</a></TD>";
      echo"</TR>";

      
	}
   echo"</TABLE>";
   echo"<br><a href='yuh.php'><--초기 화면</a>";
?>