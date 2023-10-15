<?php
  $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");

  $name = $_POST["name"];
  $RRN = $_POST["RRN"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];

  $sql = "DELETE FROM citizen WHERE RRN = '".$RRN."'";
  $ret = mysqli_query($con, $sql);
  echo "<h1> 국민 정보 삭제 결과 </h1>";
  if($ret) {
    echo "데이터가 성공적으로 삭제됨";
  }
  else {
    echo "데이터 삭제 실패"."<br>";
    echo "실패 원인 :".mysqli_error($con);
  }
  mysqli_close($con);

  echo "<br> <a href = 'citizeninfo.php'> <--국민 정보 화면으로</a> ";
?>
