<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>경북대병원</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
  #btn{ border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size:45px }
  #btn_group button{ border: 3px solid orange; background-color: rgba(0,0,0,0); color: orange; width:450px; height:350px; }
  #btn_group button:hover{ color:white; background-color: #ff4500; }
  video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}td,th{background-color:#fff;border:1px solid #ddd;width:300px; height:10px;line-height:2em}caption{font-size:1.5em;margin-bottom:12px}input,select{font-size:1rem}button{font-size:1.2rem;margin-right:8px}textarea{padding:8px;font-size:.95em;width:360px;border:1px solid #ddd}label{display:inline-block;margin-right:12px;vertical-align:top}.header{display:grid;grid-template-columns:24px 600px 1fr 84px 24px;grid-template-areas:'left-space logo nav account right-space';align-items:center;height:64px;
  background-color:#39FF14}.header .logo{grid-area:logo;font-size:2rem;font-weight:700;text-decoration:none;color:#fff}.header .nav{grid-area:nav}.header .nav li{display:inline-block;margin-right:36px}.header .nav li a{font-size:1.25rem;text-decoration:none;color:#fff}.header .account{grid-area:account;font-size:1.5rem;text-decoration:none;color:#fff}.main{display:grid;grid-template-columns:280px 1fr;grid-template-areas:'aside content'}.main .aside{grid-area:aside;background-color:#eee;border-right:1px solid #d3d3d3;padding:36px}.main .aside .option-title{font-size:1.5em;font-weight:700;color:gray}.main .aside ol,.main .aside ul{padding-left:18px;font-size:1.15em;margin:32px 8px;line-height:1.5em}.main .aside ol li,.main .aside ul li{cursor:pointer}.main .content{grid-area:content;min-height:calc(100vh - 196px);
  background-color:#fafafa}.main .content .section.intro{padding:56px 48px;background-color:#fff;border-bottom:1px solid #d3d3d3;font-size:1.3rem;line-height:1.3em}.main .content .section.intro h1{font-size:1.5em;font-weight:700;margin-bottom:24px}.main .content .section.form{padding:36px}.footer{background-color:#383838;padding:64px 0;font-size:1.2rem;text-align:center}.footer ul>li{display:inline-block;padding:0 48px}.footer ul>li:not(:last-child){border-right:1px solid gray}.footer ul>li a{color:#fff;text-decoration:none}
  </style>
</head>
<body>
  <header class="header">
    <a class="logo" href="kuh.php">Covid-19 종합 관리 시스템(경북대병원)</a>
    <nav class="nav">
      <ul>
      </ul>
    </nav>
  </header>
  <body>
    <br>
    <center><div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <center>환자 정보</center>
      </div>
      </div></center>
<?php
  if (isset($_GET["page"]))
    $page = $_GET["page"];
  else
    $page = 1;
  if (isset($_GET["catgo"]))
    $catgo = $_GET["catgo"];
  else
    $catgo = "`confirmed num`";
  if (isset($_GET["search"]))
    $search = $_GET["search"];
  else
    $search = "";

    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
?>
  <div id = "search_box" style = "text-align: right">
    <form style = "display: inline" action = "Kconfirmedcase_all.php" method="get" value = <?php echo $search ?>>
    <select name = "catgo">
      <option value = "`confirmed num`" <?php if($catgo=="`confirmed num`"){echo "selected";}?>>확진번호</option>
      <option value = "RRN_confirmed" <?php if($catgo=="RRN_confirmed"){echo "selected";}?>>주민등록번호</option>
      <option value = "severity" <?php if($catgo=="severity"){echo "selected";}?>>구분</option>
    </select>
    <input type = "text" name = "search" size = "20" value = <?php echo $search ?>> <button style="font-size:14px;width:4%;height:50%":10px">검색</button>
    </form>
    <button onclick="location.href='Kinsertconfirmed_case.php'" style="font-size:14px;width:6%;height:50%"/>환자추가</button></div>
  </div>
<?php
  if(empty($search)) {
  $sql = "SELECT COUNT(*) FROM `confirmed case`";// 뷰테이블로 구성
  $total = $con->query($sql)->fetch_row()[0];
  }
  else {
    $sql = "SELECT COUNT(*) FROM `confirmed case` WHERE $catgo like '%$search%' ";
    $total = $con->query($sql)->fetch_row()[0];
}
  $list = 30;
  $block_cnt = 10;
  $block_num = ceil($page / $block_cnt);
  $block_start = (($block_num - 1) * $block_cnt) + 1;
  $block_end = $block_start + $block_cnt - 1;
  
  $total_page = ceil($total / $list);
  if($block_end > $total_page) {
    $block_end = $total_page;
  }
  $total_block = ceil($total_page / $block_cnt);
  $page_start = ($page - 1) * $list;

  $sql1 = "SELECT `confirmed num`, `name`, `RRN_confirmed`, A.`room num`, `hospitalization date`, `discharge date`, `death date`, `severity` FROM `hospital room` AS ROOM JOIN (SELECT `confirmed num`, `name`, `RRN_confirmed`, `room num`, `hospitalization date`, `discharge date`, `death date`,`severity` FROM `confirmed case` JOIN `citizen` ON `citizen`.`RRN` = `confirmed case`.`RRN_confirmed`)  AS A ON A.`room num` = ROOM.`room num` WHERE ROOM.`hospital_code` = 'kbuh' AND $catgo like '%$search%' ORDER BY `confirmed num` LIMIT $page_start, $list";
  $ret1 = mysqli_query($con, $sql1);

?>
    <center><table class="table table-hover table-bordered">
        <thead class="table-light">
        <tr>
          <th scope = "col"><center>확진번호</th>
          <th scope = "col"><center>이름</th>
          <th scope = "col"><center>주민등록번호</th>
          <th scope = "col"><center>병실</th>
          <th scope = "col"><center>입원일</th>
          <th scope = "col"><center>퇴원일</th>
          <th scope = "col"><center>사망일</th>
          <th scope = "col"><center>구분일</th>
          <th scope = "col"><center>수정</th>
          <th scope = "col"><center>삭제</th>
        </tr>
      </thead>
   <tbody>
<?php
    $brcount = 0;
  while($row = mysqli_fetch_array($ret1)) {
    if($row['severity'] == 1)
    {
          $severity = "무증상";
    }
    if($row['severity'] == 2)
    {
          $severity = "일반환자";
    }
        if($row['severity'] == 3)
    {
          $severity = "중환자";
    }
    echo "<TR>";
    echo "<TD><center>", $row['confirmed num'], "</TD>";
    echo "<TD><center>", $row['name'], "</TD>";
    echo "<TD><center>", $row['RRN_confirmed'], "</TD>";
    echo "<TD><center>", $row['room num'], "</TD>";
    echo "<TD><center>", $row['hospitalization date'], "</TD>";
    echo "<TD><center>", $row['discharge date'], "</TD>";
    echo "<TD><center>", $row['death date'], "</TD>";
    echo "<TD><center>", $severity, "</TD>";
    echo "<TD><center>", "<a href='Kupdateconfirmed.php?RRN_confirmed=", $row['RRN_confirmed'], "'>수정</a></TD>";
    echo "<TD><center>", "<a href='Kdeleteconfirmed.php?RRN_confirmed=", $row['RRN_confirmed'], "'>삭제</a></TD>";
    echo "</TR>";
    $brcount++;
}
?>
  </tbody>
  </table>
<?php
  mysqli_close($con);
  for($i = 0; $i < 2*($list - $brcount); $i++) {
    echo "<br>";
  }

  if ($page > 1) {$pre = $page - 1;}
  else {$pre = $page;}
  if ($page < $total_page) {$next = $page + 1;}
  else {$next = $page;}

    echo "<a href='Kconfirmedcase_all.php?page=1&catgo=$catgo&search=$search'> 처음 </a>";
    echo "<a href='Kconfirmedcase_all.php?page=$pre&catgo=$catgo&search=$search'> 이전 </a>";
    for ($i = $block_start; $i <= $block_end; $i++) {
      if($page == $i) {
        echo "</b> $i </b>";
      } 
      else {
        echo "<a href = 'Kconfirmedcase_all.php?page=$i&catgo=$catgo&search=$search'> $i </a>";
      }
    }
    echo "<a href='Kconfirmedcase_all.php?page=$next&catgo=$catgo&search=$search'> 다음 </a>";
    echo "<a href='Kconfirmedcase_all.php?page=$total_page&catgo=$catgo&search=$search'> 마지막 </a>";

?>
  </body>
  <br><br> <center> <input type="button" value="메인으로" onclick="location.href='kuh.php'" style="width:5%;height:50%"/> </center>
</html>