<?php
   $con = mysqli_connect("localhost","root","1234","covid-19")or die("MySQL 접속 실패!!");

   if(empty($_GET["name"]))
   {
      if(empty($_GET['RRN_test']))
      {
         echo "정보를 입력해주세요 !! <br><br> <a href='dgh.php'><--초기 화면</a>";
         exit(0);
      }
      else
      {
         $RRN = $_GET["RRN_test"];
         $sql = "SELECT * FROM `covid-19`.`citizen` JOIN `covid-19`.`testing` ON `citizen`.`RRN` = `testing`.`RRN_test` WHERE `RRN` = '$RRN'";
      }
   }
   else
   {
      if(empty($_GET['RRN_test']))
      {
         $name = $_GET["name"];
         $sql = "SELECT * FROM `covid-19`.`citizen` JOIN `covid-19`.`testing` ON `citizen`.`RRN` = `testing`.`RRN_test` WHERE `name` = '$name'";
      }
      else
      {
         $name = $_GET["name"];
         $RRN = $_GET["RRN_test"];
         $sql = "SELECT * FROM `covid-19`.`citizen` JOIN `covid-19`.`testing` ON `citizen`.`RRN` = `testing`.`RRN_test` WHERE `name` = '$name' AND `RRN` = '$RRN'";
      }
   }
	
   $ret = mysqli_query($con, $sql);
   if($ret){
      $count = mysqli_num_rows($ret);
   }
   else{
      echo "testing 데이터 조회 실패!!!","<br>";
      echo "실패 원인 : ".mysqli_error($con);
      exit();
   }
   
   echo"<h1> 코로나 검사결과 조회 </h1>";
   echo"<TABLE border=1>";
   echo"<TR>";
   echo"<TH>이름</TH><TH>주민등록번호</TH><TH>검사결과</TH><TH>검사날짜</TH><TH>해외입국여부</TH><TH>검사위치</TH>";
   while($row = mysqli_fetch_array($ret)){
      echo"<TR>";
      echo"<TD>",$row['name'],"</TD>";
      echo"<TD>",$row['RRN_test'],"</TD>";
	if($row['test result'] == 1)
      echo"<TD>","양성","</TD>";
	else
      echo"<TD>","음성","</TD>";
   echo"<TD>",$row['test date'],"</TD>";
	if($row['imported case'] == 1)
      echo"<TD>","O","</TD>";
	else
      echo"<TD>","X","</TD>";
   echo "<TD>", $row['test location'], "</TD>";
   echo"</TR>"; 
	
	}
   mysqli_close($con);
   echo"</TABLE>";
   echo"<br><a href='dgh.php'><--초기 화면</a>";
?>