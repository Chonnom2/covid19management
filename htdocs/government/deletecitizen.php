<?php
  $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
  $sql = "SELECT * FROM citizen WHERE RRN = '".$_GET['RRN']."'";
  $ret = mysqli_query($con, $sql);
  if($ret) {
    $count = mysqli_num_rows($ret);
    if ($count == 0) {
      echo $_GET['RRN']." 해당 주민등록번호의 국민이 없음"."<br>";
      echo "<br> <a href = 'preupdatecitizen.php'> <--국민 정보 삭제 화면으로</a> ";
      exit();
    }
  }
  else {
    echo "데이터 조회 실패"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
  }

  $row = mysqli_fetch_array($ret);
  $name = $row['name'];
  $RRN = $row['RRN'];
  $address = $row['address'];
  $phone = $row['phone'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>국민정보삭제</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
    </style>
</Head>
<BODY>
<h1> 국민 정보 삭제 </h1>
<FORM METHOD = "post" ACTION = "deletecitizen_result.php">
  이름 : <INPUT TYPE = "text" NAME = "name" VALUE = <?php echo $name ?>> <br>
  주민등록번호 : <INPUT TYPE = "text" NAME = "RRN" VALUE = <?php echo $RRN ?> READONLY> <br>
  주소 : <INPUT TYPE = "text" NAME = "address" VALUE = <?php echo $address ?>> <br>
  휴대폰 : <INPUT TYPE = "text" NAME = "phone" VALUE = <?php echo $phone ?>> <br>
  <BR><BR>  <BR><BR>
  위 국민 정보를 삭제하겠습니까?
  <INPUT TYPE = "submit" VALUE = "삭제">
  <INPUT TYPE = "button" onclick="location.href='citizeninfo.php'" VALUE = "취소">
</FORM>
</BODY>
</HTML>
