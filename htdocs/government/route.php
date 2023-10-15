<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>확진환자동선</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style> 
  .button {
    background-color: #fafafa;
    border: none;
    color: black;
    font-size: 16px;
    font-weight : bold;
    cursor: pointer;
  }
  </style>
  <style>
video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,
figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}
table{border-collapse:collapse;border-spacing:0}td,th{background-color:#fff;border:1px solid #ddd;width:300px; height:10px;line-height:2em}caption{font-size:1.5em;margin-bottom:12px}
input,select{font-size:1rem}button{font-size:1.2rem;margin-right:8px}textarea{padding:8px;font-size:.95em;width:360px;border:1px solid #ddd}label{display:inline-block;margin-right:12px;
vertical-align:top}.header{display:grid;grid-template-columns:24px 600px 1fr 84px 24px;grid-template-areas:'left-space logo nav account right-space';align-items:center;height:64px;
background-color:#ff4500}.header .logo{grid-area:logo;font-size:2rem;font-weight:700;text-decoration:none;color:#fff}.header .nav{grid-area:nav}.header .nav li{display:inline-block;
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
    <a class="logo" href="GovernmentMain.php">Covid-19 종합 관리 시스템(정부용)</a>
    <nav class="nav">
      <ul>
      </ul>
    </nav>
  </header>
  <body>
    <br>
    <?php
        $today = date("Y-m-d",time()); ////////// <000000
        echo "( ".$today." 기준 )<br><br><br>";
    ?>
      <div class="card" style="width:20rem;font-size:25px;">
      <div class="card-body">
      환자 발생 장소 현황
      </div>
      </div>
<?php

// 페이지 정보 불러오기
  if (isset($_GET["page"]))
    $page = $_GET["page"];
  else
    $page = 1;

  $con = mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
  $sql = "SELECT COUNT(*) FROM `information on routes`";
  $total = $con->query($sql)->fetch_row()[0];

  // 페이징 변수 설정
  $list = 10; // 한 페이지에 나타낼 튜플 개수
  $block_cnt = 10; // 한 블록에 나타낼 페이지 개수
  $block_num = ceil($page / $block_cnt);
  $block_start = (($block_num - 1) * $block_cnt) + 1;
  $block_end = $block_start + $block_cnt - 1;

  $total_page = ceil($total / $list);
  if($block_end > $total_page) {
    $block_end = $total_page;
  }
  $total_block = ceil($total_page / $block_cnt);
  $page_start = ($page - 1) * $list;
  
?>
<?php
    if(array_key_exists('local', $_GET)) {
      $abc = 'local';
      $value = '지역';
    }
    else if(array_key_exists('daytime', $_GET)) {
      $abc = 'daytime';
      $value = '노출+일자';
    }
?>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
            <tr>
              <form method="get">
                <th><input type="submit" name="local" class="button" value="지역"/></th>
                <th>장소</th>
                <th><input type="submit" name="daytime" class="button" value="노출 일자"/></th>
              </form>
            </tr>
        </thead>
        <tbody>
            <?php
                global $today;
                global $abc;

                $brcount = 0;
                if ($abc == 'daytime') 
                  $sql_route = mysqli_query($con, "SELECT `location`, `exposed time` FROM `information on routes` ORDER BY `exposed time` LIMIT $page_start, $list;");
                else if ($abc == 'local') 
                  $sql_route = mysqli_query($con, "SELECT `location`, `exposed time` FROM `information on routes` ORDER BY `location` LIMIT $page_start, $list;");
                else 
                  $sql_route = mysqli_query($con, "SELECT  `location`, `exposed time` FROM `information on routes` ORDER BY `location` LIMIT $page_start, $list");
                while ($row = mysqli_fetch_array($sql_route)) {
                    $sql_routelot = mysqli_query($con, "SELECT * FROM `information on routes` WHERE `location` = '$row[0]'");
                    $count_routelot = mysqli_num_rows($sql_routelot);
                    $lot = explode(' ', $row[0]);
                    echo '<tr><td>'.$lot[0].'</td>';
                    echo '<td>'.$lot[1].'</td>';
                    echo '<td>'.$row[1].'</td>';
                    $brcount++;
                }
            ?>
        </tbody>
    </table>
<center>
<?php
  global $value, $abc;

  // 페이징 버튼 만들기
  for($i = 0; $i < 2*($list - $brcount); $i++) {
    echo "<br>";
  }

  if ($page > 1) {$pre = $page - 1;}
  else {$pre = $page;}
  if ($page < $total_page) {$next = $page + 1;}
  else {$next = $page;}

    echo "<a href='route.php?page=1&$abc=$value'> 처음 </a>";
    echo "<a href='route.php?page=$pre&$abc=$value'> 이전 </a>";
    for ($i = $block_start; $i <= $block_end; $i++) {
      if($page == $i) {
        echo "</b> $i </b>";
      } 
      else {
        echo "<a href = 'route.php?page=$i&$abc=$value'> $i </a>";
      }
    }
    echo "<a href='route.php?page=$next&$abc=$value'> 다음 </a>";
    echo "<a href='route.php?page=$total_page&$abc=$value'> 마지막 </a>";
?>
    <br><br> <center> <input type="button" value="메인으로" onclick="location.href='GovernmentMain.php'"/> </center>
    </body>
</html> 
