<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>영남대병원</title>
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
    <a class="logo" href="yuh.php">Covid-19 종합 관리 시스템(영남대병원)</a>
    <nav class="nav">
      <ul>
      </ul>
    </nav>
  </header>
  <body>
    <br>
    <center><div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <center>검사 정보</center>
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
    $catgo = "`test num`";
  if (isset($_GET["search"]))
    $search = $_GET["search"];
  else
    $search = "";

    $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
?>
  <div id = "search_box" style = "text-align: right">
    <form style = "display: inline" action = "Ytestcase_all.php" method="get" value = <?php echo $search ?>>
    <select name = "catgo">
      <option value = "`test num`" <?php if($catgo=="`test num`"){echo "selected";}?>>검사번호</option>
      <option value = "RRN_" <?php if($catgo=="RRN_test"){echo "selected";}?>>주민등록번호</option>
    </select>
    <input type = "text" name = "search" size = "20" value = <?php echo $search ?>> <button style="font-size:14px;width:4%;height:50%":10px">검색</button>
    </form>
    <button onclick="location.href='Ytestinginsert.php'" style="font-size:14px;width:6%;height:50%"/>검사추가</button></div>
  </div>
<?php
  if(empty($search)) {
  $sql = "SELECT COUNT(*) FROM `testing` WHERE `test location` = 'ynuh'";// 뷰테이블로 구성
  $total = $con->query($sql)->fetch_row()[0];
  }
  else {
    $sql = "SELECT COUNT(*) FROM `testing` WHERE `test location` = 'ynuh' AND $catgo like '%$search%' ";
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

  $sql1 = "SELECT `test num`, `name`, `RRN_test`, `test result`, `test date`, `imported case` FROM `testing` JOIN `citizen` ON citizen.RRN = `testing`.`RRN_test` WHERE `test location` = 'ynuh' AND $catgo like '%$search%' ORDER BY `test num` LIMIT $page_start, $list";
  $ret1 = mysqli_query($con, $sql1);

?>
    <center><table class="table table-hover table-bordered">
        <thead class="table-light">
        <tr>
          <th scope = "col"><center>검사번호</th>
          <th scope = "col"><center>이름</th>
          <th scope = "col"><center>주민등록번호</th>
          <th scope = "col"><center>검사결과</th>
          <th scope = "col"><center>검사일</th>
          <th scope = "col"><center>해외입국여부</th>
          <th scope = "col"><center>수정</th>
          <th scope = "col"><center>삭제</th>
        </tr>
      </thead>
   <tbody>
<?php
    $brcount = 0;
  while($row = mysqli_fetch_array($ret1)) {
    echo "<TR>";
    echo "<TD><center>", $row['test num'], "</TD>";
    echo "<TD><center>", $row['name'], "</TD>";
    echo "<TD><center>", $row['RRN_test'], "</TD>";
    if($row['test result'] == 1)
        echo"<TD><center>","양성","</TD>";
    else if($row['test result'] == 1)
        echo"<TD><center>","음성","</TD>";
    else
        echo"<TD><center>","검사결과 대기중","</TD>";
    echo "<TD><center>", $row['test date'], "</TD>";
    if($row['imported case'] == 1)
        echo"<TD><center>","O","</TD>";
    else
        echo"<TD><center>","X","</TD>";
    echo "<TD><center>", "<a href='Ytestingupdate.php?test_num=", $row['test num'], "'>수정</a></TD>";
    echo "<TD><center>", "<a href='Ytestingdelete.php?test_num=", $row['test num'], "'>삭제</a></TD>";
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

    echo "<a href='Ytestcase_all.php?page=1&catgo=$catgo&search=$search'> 처음 </a>";
    echo "<a href='Ytestcase_all.php?page=$pre&catgo=$catgo&search=$search'> 이전 </a>";
    for ($i = $block_start; $i <= $block_end; $i++) {
      if($page == $i) {
        echo "</b> $i </b>";
      } 
      else {
        echo "<a href = 'Ytestcase_all.php?page=$i&catgo=$catgo&search=$search'> $i </a>";
      }
    }
    echo "<a href='Ytestcase_all.php?page=$next&catgo=$catgo&search=$search'> 다음 </a>";
    echo "<a href='Ytestcase_all.php?page=$total_page&catgo=$catgo&search=$search'> 마지막 </a>";

?>
  </body>
  <br><br> <center> <input type="button" value="메인으로" onclick="location.href='yuh.php'" style="width:5%;height:50%"/> </center>
</html>