<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>모더나</title>
  <style> 
  #btn{ border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size:45px }
  #btn_group button{ border: 3px solid orange; background-color: rgba(0,0,0,0); color: orange; width:450px; height:350px; }
  #btn_group button:hover{ color:white; background-color: #2E2EFE; }
  </style>
  <style>
    a,abbr,acronym,address,applet,article,aside,audio,big,blockquote,body,canvas,caption,center,cite,code,dd,del,details,dfn,div,dl,dt,em,embed,fieldset,figcaption,
figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,output,p,pre,q,ruby,s,samp,section,small,span,strike,
summary,table,tbody,td,tfoot,th,thead,time,tr,tt,u,ul,var,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,
figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}
table{border-collapse:collapse;border-spacing:0}td,th{background-color:#fff;border:1px solid #ddd;width:300px; height:10px;line-height:2em}caption{font-size:1.5em;margin-bottom:12px}
input,select{font-size:1rem}button{font-size:1.2rem;margin-right:8px}textarea{padding:8px;font-size:.95em;width:360px;border:1px solid #ddd}label{display:inline-block;margin-right:12px;
vertical-align:top}.header{display:grid;grid-template-columns:24px 600px 1fr 84px 24px;grid-template-areas:'left-space logo nav account right-space';align-items:center;height:64px;
background-color:#2E2EFE}.header .logo{grid-area:logo;font-size:2rem;font-weight:700;text-decoration:none;color:#fff}.header .nav{grid-area:nav}.header .nav li{display:inline-block;
margin-right:36px}.header .nav li a{font-size:1.25rem;text-decoration:none;color:#fff}.header .account{grid-area:account;font-size:1.5rem;text-decoration:none;color:#fff}.main{display:grid;
grid-template-columns:280px 1fr;grid-template-areas:'aside content'}.main .aside{grid-area:aside;background-color:#eee;border-right:1px solid #d3d3d3;padding:36px}.main .aside .option-title{font-size:1.5em;
font-weight:700;color:gray}.main .aside ol,.main .aside ul{padding-left:18px;font-size:1.15em;margin:32px 8px;
line-height:1.5em}.main .aside ol li,.main .aside ul li{cursor:pointer}.main .content{grid-area:content;min-height:calc(100vh - 196px);
background-color:#fafafa}.main .content .section.intro{padding:56px 48px;background-color:#fff;border-bottom:1px solid #d3d3d3;
font-size:1.3rem;line-height:1.3em}.main .content .section.intro h1{font-size:1.5em;font-weight:700;margin-bottom:24px}.main .content .section.form{padding:36px}.footer{background-color:#383838;
padding:64px 0;font-size:1.2rem;text-align:center}.footer ul>li{display:inline-block;padding:0 48px}.footer ul>li:not(:last-child){border-right:1px solid gray}.footer ul>li a{color:#fff;text-decoration:none}
  </style>
</head>
<body>
  <header class="header">
    <a class="logo" href="moderna_main.php">Covid-19 종합 관리 시스템(모더나)</a>
    <nav class="nav">
      <ul>
      </ul>
    </nav>
  </header>
  <body>

  


<div style="position: absolute; top:7.5%; left:45%;font-size:25px;width:15%;height:50%;">재고 검색 결과</div>
<div style="position: absolute; top:7.5%; left:91%;"><button onclick="location.href='moderna_inventory_add.php'" style="font-size:15px;width:100px;height:45%">재고추가</button></div>
<br><br>
<?php
  $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
  $inum = $_GET["inum"];
  if(empty($inum))
  {
    echo "<h1> 검색어를 입력해주세요!!! </h1>";
    echo "<a href= 'moderna_main.php'> 되돌아가기 </a>";
    exit();
  }
  
  $sql = "SELECT * FROM `moderna_inventory` WHERE `inventory_num` = $inum";
  $ret = mysqli_query($con, $sql);
  if($ret){
    $count = mysqli_num_rows($ret);
    if($count == 0){
        echo $_GET['inum']." 해당 재고 넘버의 계약이 없음!!"."<br>";
        echo "<br><a href = 'moderna_main.php'><--초기 화면</a>";
        exit();
    }
}
else{
    echo "데이터 조회 실패!!!","<br>";
    echo "실패 원인 :",mysqli_error($con);
    echo "<br><a href='moderna_main.php'><--초기화면</a>";
    exit();
}
  mysqli_close($con);
  // 표만들기
 
  echo "<CENTER><TABLE border=1>";
  echo "<TR>";
  echo "<TH>재고번호</TH><TH>로트번호</TH><TH>창고코드</TH><TH>수량</TH><TH>수정</TH><TH>삭제</TH>";
  echo "</TR>";
  $row = mysqli_fetch_array($ret);
  echo "<TR>";
  echo "<TD><center>", $row['inventory_num'], "</TD>";
  echo "<TD><center>", "<a href = 'moderna_vaccineinform_information.php?lot_num=".$row['lot number']. "'>",$row['lot number'],"</TD>";
  echo "<TD><center>", "<a href = 'moderna_warehouse_information.php?warehouse_code=".$row['warehouse_code']. "'>",$row['warehouse_code'],"</TD>";
  echo "<TD><center>", number_format($row['quantity']), "</TD>";
  echo "<TD><center>", "<a href= 'moderna_inventory_update.php?inventory_num=".$row['inventory_num']."'>수정</a></TD>";
  echo "<TD><center>", "<a href= 'moderna_inventory_delete.php?inventory_num=".$row['inventory_num']."'>삭제</a></TD>";
  echo "</TR>";
  echo "</TABLE><br>";

?>

  </body>
  <br><br> <center> <input type="button" value="메인으로" onclick="location.href='moderna_main.php'" style="width:5%;height:50%"/> </center>
</html>

