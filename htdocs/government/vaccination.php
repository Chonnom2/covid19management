<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>백신접종여부</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style> 
  #btn{ border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size:45px }
  #btn_group button{ border: 3px solid orange; background-color: rgba(0,0,0,0); color: orange; width:450px; height:350px; }
  #btn_group button:hover{ color:white; background-color: #ff4500; }
  </style>
  <style>
  video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}td,th{background-color:#fff;border:1px solid #ddd;width:300px; height:10px;line-height:2em}caption{font-size:1.5em;margin-bottom:12px}input,select{font-size:1rem}button{font-size:1.2rem;margin-right:8px}textarea{padding:8px;font-size:.95em;width:360px;border:1px solid #ddd}label{display:inline-block;margin-right:12px;vertical-align:top}.header{display:grid;grid-template-columns:24px 600px 1fr 84px 24px;grid-template-areas:'left-space logo nav account right-space';align-items:center;height:64px;
  background-color:#ff4500}.header .logo{grid-area:logo;font-size:2rem;font-weight:700;text-decoration:none;color:#fff}.header .nav{grid-area:nav}.header .nav li{display:inline-block;margin-right:36px}.header .nav li a{font-size:1.25rem;text-decoration:none;color:#fff}.header .account{grid-area:account;font-size:1.5rem;text-decoration:none;color:#fff}.main{display:grid;grid-template-columns:280px 1fr;grid-template-areas:'aside content'}.main .aside{grid-area:aside;background-color:#eee;border-right:1px solid #d3d3d3;padding:36px}.main .aside .option-title{font-size:1.5em;font-weight:700;color:gray}.main .aside ol,.main .aside ul{padding-left:18px;font-size:1.15em;margin:32px 8px;line-height:1.5em}.main .aside ol li,.main .aside ul li{cursor:pointer}.main .content{grid-area:content;min-height:calc(100vh - 196px);
  background-color:#fafafa}.main .content .section.intro{padding:56px 48px;background-color:#fff;border-bottom:1px solid #d3d3d3;font-size:1.3rem;line-height:1.3em}.main .content .section.intro h1{font-size:1.5em;font-weight:700;margin-bottom:24px}.main .content .section.form{padding:36px}.footer{background-color:#383838;padding:64px 0;font-size:1.2rem;text-align:center}.footer ul>li{display:inline-block;padding:0 48px}.footer ul>li:not(:last-child){border-right:1px solid gray}.footer ul>li a{color:#fff;text-decoration:none}
  </style>
</head>
<body>
  <header class="header">
    <a class="logo" href="GovernmentMain.php">Covid-19 종합 관리 시스템(정부)</a>
    <nav class="nav">
      <ul>
      </ul>
    </nav>
  </header>
    <br>
    <div class="list-group" style=color: #ff4500;">
      <a href="#1" class="list-group-item list-group-item-action">국민 백신 접종 여부</a>
      <a href="#2" class="list-group-item list-group-item-action">시도별 접종 현황</a>
      <br>
    </div>
    <br>
    <?php
      echo "(";
      $date = date("Y-m-d", time());
      echo $date;
      echo "기준)";
    ?>
    <h3><?php
      echo "<br>";
      $con = mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
      $sql = "SELECT count(*) as CNT FROM citizen";
      $ret = mysqli_query($con, $sql);
      $citizen = mysqli_fetch_array($ret);
      $sql = "SELECT count(*) as CNT FROM vaccination";
      $ret = mysqli_query($con, $sql);
      $vaccination = mysqli_fetch_array($ret);
      $percent = ($vaccination['CNT'] / $citizen['CNT']) * 100;
      echo '<center>'.round($percent,2)."% 접종완료".'</center>';
    ?></h3>
      <br><br>
    <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="1">
      국민 백신 접종 여부
      </a>
      </div>
      </div>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
        <tr>
          <th>구분</th>
          <th>1차접종</th>
          <th>2차접종</th>
          <th>추가접종</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $con = mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");

          $sql1 = "SELECT IFNULL(sum(case `vaccine series` when 1 then 1 end), 0) as cnt1, IFNULL(sum(case `vaccine series` when 2 then 1 end), 0) as cnt2, IFNULL(sum(case `vaccine series` when 3 then 1 end), 0) as cnt3 FROM vaccination";
          $sql2 = "SELECT IFNULL(sum(case `vaccine series` when 1 then 1 end), 0) as cnt1, IFNULL(sum(case `vaccine series` when 2 then 1 end), 0) as cnt2, IFNULL(sum(case `vaccine series` when 3 then 1 end), 0) as cnt3 FROM vaccination WHERE `date` = CURDATE()";
          $sql3 = "SELECT IFNULL(sum(case `vaccine series` when 1 then 1 end), 0) as cnt1, IFNULL(sum(case `vaccine series` when 2 then 1 end), 0) as cnt2, IFNULL(sum(case `vaccine series` when 3 then 1 end), 0) as cnt3 FROM vaccination WHERE `date` < CURDATE()";

          $ret1 = mysqli_fetch_array(mysqli_query($con, $sql1));
          $ret2 = mysqli_fetch_array(mysqli_query($con, $sql2));
          $ret3 = mysqli_fetch_array(mysqli_query($con, $sql3));

          echo '<tr><th>'."당일누적".'</th><td>';
          echo $ret1[0].'</td><td>';
          echo $ret1[1].'</td><td>';
          echo $ret1[2].'</td><tr>';

          echo '<tr><th>'."당일실적".'</th><td>';
          echo $ret2[0].'</td><td>';
          echo $ret2[1].'</td><td>';
          echo $ret2[2].'</td><tr>';

          echo '<tr><th>'."전일누적".'</th><td>';
          echo $ret3[0].'</td><td>';
          echo $ret3[1].'</td><td>';
          echo $ret3[2].'</td><tr>';
        ?>
      </tbody>
    </table>
      <br><br><br>
    <div class="card" style="width:18rem;font-size:25px;">
    <div class="card-body">
      <a name="2">
      시도별 접종 현황
      </a>
    </div>
     </div>
    <br>
    <table>
    <center><table class="table table-hover table-bordered">
        <thead class="table-light">
        <tr>
          <th rowspan = "2"></th>
          <th colspan = "2">1차접종</th>
          <th colspan = "2">2차접종</th>
          <th colspan = "2">추가접종</th>
        </tr>
        <tr>
          <th>당일 실적</th>
          <th>당일 누계</th>
          <th>당일 실적</th>
          <th>당일 누계</th>
          <th>당일 실적</th>
          <th>당일 누계</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
          $sql_first_today = "SELECT n, IFNULL(CNT, 0) AS COUNT FROM ( SELECT left(`address`, 2) as n FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) GROUP BY n ) as A LEFT OUTER JOIN ( SELECT left(`address`, 2) as sn, count(*) AS CNT FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) where `vaccine series` = 1 AND `date` = CURDATE() GROUP BY sn )AS B ON A.n = B.sn ORDER BY A.n";
          $sql_second_today = "SELECT n, IFNULL(CNT, 0) AS COUNT FROM ( SELECT left(`address`, 2) as n FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) GROUP BY n ) as A LEFT OUTER JOIN ( SELECT left(`address`, 2) as sn, count(*) AS CNT FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) where `vaccine series` = 2 AND `date` = CURDATE() GROUP BY sn )AS B ON A.n = B.sn ORDER BY A.n";
          $sql_boost_today = "SELECT n, IFNULL(CNT, 0) AS COUNT FROM ( SELECT left(`address`, 2) as n FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) GROUP BY n ) as A LEFT OUTER JOIN ( SELECT left(`address`, 2) as sn, count(*) AS CNT FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) where `vaccine series` = 3 AND `date` = CURDATE() GROUP BY sn )AS B ON A.n = B.sn ORDER BY A.n";
          $sql_first_all = "SELECT n, IFNULL(CNT, 0) AS COUNT FROM ( SELECT left(`address`, 2) as n FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) GROUP BY n ) as A LEFT OUTER JOIN ( SELECT left(`address`, 2) as sn, count(*) AS CNT FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) where `vaccine series` = 1 GROUP BY sn )AS B ON A.n = B.sn ORDER BY A.n";
          $sql_second_all = "SELECT n, IFNULL(CNT, 0) AS COUNT FROM ( SELECT left(`address`, 2) as n FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) GROUP BY n ) as A LEFT OUTER JOIN ( SELECT left(`address`, 2) as sn, count(*) AS CNT FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) where `vaccine series` = 2 GROUP BY sn )AS B ON A.n = B.sn ORDER BY A.n";
          $sql_boost_all = "SELECT n, IFNULL(CNT, 0) AS COUNT FROM ( SELECT left(`address`, 2) as n FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) GROUP BY n ) as A LEFT OUTER JOIN ( SELECT left(`address`, 2) as sn, count(*) AS CNT FROM vaccination LEFT JOIN citizen ON (RRN_vaccine = RRN) where `vaccine series` = 3 GROUP BY sn )AS B ON A.n = B.sn ORDER BY A.n";

          $ret_first_all = mysqli_query($con, $sql_first_all);
          $ret_second_all = mysqli_query($con, $sql_second_all);
          $ret_boost_all = mysqli_query($con, $sql_boost_all);
          $ret_first_today = mysqli_query($con, $sql_first_today);
          $ret_second_today = mysqli_query($con, $sql_second_today);
          $ret_boost_today = mysqli_query($con, $sql_boost_today);

          $board_first_today = mysqli_fetch_assoc($ret_first_today);
          $board_second_today = mysqli_fetch_assoc($ret_second_today);
          $board_boost_today = mysqli_fetch_assoc($ret_boost_today);
          $board_first_all = mysqli_fetch_assoc($ret_first_all);
          $board_second_all = mysqli_fetch_assoc($ret_second_all);
          $board_boost_all = mysqli_fetch_assoc($ret_boost_all);

          echo '<tr><th>'."합계".'</th><th>';
          echo $ret2[0].'</th><th>';
          echo $ret1[0].'</th><th>';
          echo $ret2[1].'</th><th>';
          echo $ret1[1].'</th><th>';
          echo $ret2[2].'</th><th>';
          echo $ret2[1].'</th><tr>';


          echo '<tr><td>'.$board_first_today['n'].'</td><td>';
          echo $board_first_today['COUNT'].'</td><td>';
          echo $board_first_all['COUNT'].'</td><td>';
          echo $board_second_today['COUNT'].'</td><td>';
          echo $board_second_all['COUNT'].'</td><td>';
          echo $board_boost_today['COUNT'].'</td><td>';
          echo $board_boost_all['COUNT'].'</td></tr>';                

          while($row = mysqli_fetch_array($ret_first_today,MYSQLI_BOTH)) {
            echo '<tr><td>'.$row['n'].'</center>'.'</td><td>';
            echo $row['COUNT'].'</center>'.'</td><td>';
            $row = mysqli_fetch_array($ret_first_all, MYSQLI_BOTH);
            echo $row['COUNT'].'</center>'.'</td><td>';
            $row = mysqli_fetch_array($ret_second_today, MYSQLI_BOTH);
            echo $row['COUNT'].'</center>'.'</td><td>';
            $row = mysqli_fetch_array($ret_second_all, MYSQLI_BOTH);
            echo $row['COUNT'].'</center>'.'</td><td>';
            $row = mysqli_fetch_array($ret_boost_today, MYSQLI_BOTH);
            echo $row['COUNT'].'</center>'.'</td><td>';
            $row = mysqli_fetch_array($ret_boost_all, MYSQLI_BOTH);
            echo $row['COUNT'].'</center>'.'</td></tr>';
          }
        ?>
      </tbody>
    </table>

    <br><br> <center> <input type="button" value="메인으로" onclick="location.href='GovernmentMain.php'"/> </center>
  </body>
</html>