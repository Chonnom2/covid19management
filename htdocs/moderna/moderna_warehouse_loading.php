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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </header>
  <body>

<?php
// 페이지 정보 불러오기
  if (isset($_GET["page"]))
    $page = $_GET["page"];
  else
    $page = 1;

    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
?>
<div style="position: absolute; top:8%; left:45%;font-size:25px;width:15%;height:50%;">창고 조회 결과</div>
<br><br>
<?php
  // 검색어에 따라 다른 튜플 개수 셈(페이징 처리를 위해 필요)
  $sql = "SELECT COUNT(*) FROM `warehouse`";
  $ret = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($ret);
  $total = $row['COUNT(*)'];

  // 페이징 변수 설정
  $list = 20; // 한 페이지에 나타낼 튜플 개수
  $block_cnt = 10; // 한 블록에 나타낼 페이지 개수
  $block_num = ceil($page / $block_cnt);
  $block_start = (($block_num - 1) * $block_cnt) + 1;
  $block_end = $block_start + $block_cnt - 1;

  $total_page = ceil($total / $list);
  if($block_end > $total_page) 
  {
    $block_end = $total_page;
  }
  $total_block = ceil($total_page / $block_cnt);
  $page_start = ($page - 1) * $list;

  // 검색어에 따라 조건에 맞는 튜플 서칭
 
  $sql = "SELECT * FROM `warehouse_load` ORDER BY `warehouse code` ASC LIMIT $page_start, $list";
  $ret = mysqli_query($con, $sql);
  if(!$ret)
  {
    echo "데이터 조회 실패!!!","<br>";
    echo "실패 원인 :",mysqli_error($con);
    echo "<br><a href='moderna_main.php'><--초기화면</a>";
    exit();
}
  // 표만들기
 
  echo "<CENTER><table class='table table-hover table-bordered'><thead class='table-light'>";
  echo "<TR>";
  echo "<TH><CENTER>창고 코드</CENTER></TH><TH><CENTER>적재량</CENTER></TH><TH><CENTER>적재율</CENTER></TH>";
  echo "</TR></thead>";
  $brcount = 0;
  while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD><center>", "<a href = 'moderna_warehouse_update.php?warehouse_code=".$row['warehouse code']. "'>",$row['warehouse code'],"</TD>";
    echo "<TD><center>", number_format($row['load quantity']), "</TD>";
    echo "<TD><center>", number_format($row['load percentage'],2), "%</TD>";
    echo "</TR>";
    $brcount++;
  }
  mysqli_close($con);
  echo "</TABLE><br>";

  // 페이징 버튼 만들기
  for($i = 0; $i < 2*($list - $brcount); $i++) {
    echo "<br>";
  }

  if ($page > 1) {$pre = $page - 1;}
  else {$pre = $page;}
  if ($page < $total_page) {$next = $page + 1;}
  else {$next = $page;}

    echo "<a href='moderna_warehouse_view.php?page=1'> 처음 </a>";
    echo "<a href='moderna_warehouse_view.php?page=$pre'> 이전 </a>";
    for ($i = $block_start; $i <= $block_end; $i++) {
      if($page == $i) {
        echo "</b> $i </b>";
      } 
      else {
        echo "<a href = 'moderna_warehouse_view.php?page=$i'> $i </a>";
      }
    }
    echo "<a href='moderna_warehouse_view.php?page=$next'> 다음 </a>";
    echo "<a href='moderna_warehouse_view.php?page=$total_page'> 마지막 </a>";

?>
  </body>
  <br><br> <center> <input type="button" value="메인으로" onclick="location.href='moderna_main.php'" style="width:5%;height:50%"/> </center>
</html>