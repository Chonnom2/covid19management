<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>국민등록결과</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
    </style>
</HEAD>
<BODY>
<?php
  $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");

  $name = $_POST["name"];
  $RRN = $_POST["RRN"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];

  $sql = "INSERT INTO citizen VALUES('".$name."', '".$RRN."', '".$address."', '".$phone."')";

  $ret = mysqli_query($con, $sql);
  echo "<h1> 국민 등록 결과 </h1>";
  if($ret) {
    echo "데이터가 성공적으로 입력됨";
  }
  else {
    echo "데이터 입력 실패"."<br>";
    echo "실패 원인 :".mysqli_error($con);
  }
  mysqli_close($con);
  echo "<br> <a href = 'insertcitizen.php'> <--이전 화면으로</a> ";
?>
</BODY>
</HTML>