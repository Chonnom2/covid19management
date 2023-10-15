<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>확진자통계</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style> 
  #btn{ border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size:45px }
  #btn_group button{ border: 3px solid orange; background-color: rgba(0,0,0,0); color: orange; width:450px; height:350px; }
  #btn_group button:hover{ color:white; background-color: #ff4500; }
  video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}td,th{background-color:#fff;border:1px solid #ddd;width:300px; height:10px;line-height:2em}caption{font-size:1.5em;margin-bottom:12px}input,select{font-size:1rem}button{font-size:1.2rem;margin-right:8px}textarea{padding:8px;font-size:.95em;width:360px;border:1px solid #ddd}label{display:inline-block;margin-right:12px;vertical-align:top}.header{display:grid;grid-template-columns:24px 600px 1fr 84px 24px;grid-template-areas:'left-space logo nav account right-space';align-items:center;height:64px;
  background-color:#ff4500}.header .logo{grid-area:logo;font-size:2rem;font-weight:700;text-decoration:none;color:#fff}.header .nav{grid-area:nav}.header .nav li{display:inline-block;margin-right:36px}.header .nav li a{font-size:1.25rem;text-decoration:none;color:#fff}.header .account{grid-area:account;font-size:1.5rem;text-decoration:none;color:#fff}.main{display:grid;grid-template-columns:280px 1fr;grid-template-areas:'aside content'}.main .aside{grid-area:aside;background-color:#eee;border-right:1px solid #d3d3d3;padding:36px}.main .aside .option-title{font-size:1.5em;font-weight:700;color:gray}.main .aside ol,.main .aside ul{padding-left:18px;font-size:1.15em;margin:32px 8px;line-height:1.5em}.main .aside ol li,.main .aside ul li{cursor:pointer}.main .content{grid-area:content;min-height:calc(100vh - 196px);
  background-color:#fafafa}.main .content .section.intro{padding:56px 48px;background-color:#fff;border-bottom:1px solid #d3d3d3;font-size:1.3rem;line-height:1.3em}.main .content .section.intro h1{font-size:1.5em;font-weight:700;margin-bottom:24px}.main .content .section.form{padding:36px}.footer{background-color:#383838;padding:64px 0;font-size:1.2rem;text-align:center}.footer ul>li{display:inline-block;padding:0 48px}.footer ul>li:not(:last-child){border-right:1px solid gray}.footer ul>li a{color:#fff;text-decoration:none}
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
    <br>
    <div class="list-group" style=color: #ff4500;>
      <a href="#1" class="list-group-item list-group-item-action">코로나 입원 환자</a>
      <a href="#2" class="list-group-item list-group-item-action">일일 검사 현황</a>
      <a href="#3" class="list-group-item list-group-item-action">사망 현황</a>
      <a href="#4" class="list-group-item list-group-item-action">확진 현황</a>
      <a href="#5" class="list-group-item list-group-item-action">해외유입 확진자 현황</a>
      <a href="#6" class="list-group-item list-group-item-action">시도별 발생 현황</a>
    <br>
    </div>
    <br>
    <?php
      echo "(";
      $today = date("Y-m-d", time());
      echo $today;
      echo " 기준)";
    ?>
      <br><br><br>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="1">
      코로나 입원 환자
      </a>
      </div>
      </div>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
            <tr>
                <th>신규</th>
                <th>총계</th>
                <th>무증상</th>
                <th>경증</th>
                <th>중증</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $con = mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
                global $today;
               
                $sql_dayhospital = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `hospitalization date` = '$today'");
                $sql_totalhospital = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `room num`");
                $sql_nosevere = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `severity` = 1"); // severity = 1 -> 무증상
                $sql_ltsevere = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `severity` = 2"); // severity = 2-> 경증
                $sql_severe = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `severity` = 3"); // severity = 3 -> 중증

                $count_dayhospital = mysqli_num_rows($sql_dayhospital);
                $count_totalhospital = mysqli_num_rows($sql_totalhospital);
                $count_nosevere = mysqli_num_rows($sql_nosevere);
                $count_ltsevere = mysqli_num_rows($sql_ltsevere);
                $count_severe = mysqli_num_rows($sql_severe);

                echo '<tr><td>'.$count_dayhospital.'</td>';
                echo '<td>'.$count_totalhospital.'</td>';
                echo '<td>'.$count_nosevere.'</td>';
                echo '<td>'.$count_ltsevere.'</td>';
                echo '<td>'.$count_severe.'</td></tr>';
            ?>
        </tbody>
        </table>
      <br><br><br>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="2">
      일일 검사 현황
      </a>
      </div>
      </div>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
            <tr>
                <th>검사자 수</th>
                <th>확진자 수</th>
            </tr>
        </thead>
        <tbody>
            <?php
                global $today;
                $sql_todaytest = mysqli_query($con, "SELECT * FROM `testing` WHERE `test date` = '$today'");
                $sql_todayconfirm = mysqli_query($con, "SELECT * FROM `testing` WHERE `test result` = 1 AND `test date` = '$today'");
                $count_todaytest = mysqli_num_rows($sql_todaytest);
                $count_todayconfirm = mysqli_num_rows($sql_todayconfirm);

                echo '<tr><td>'.$count_todaytest.'</td>';
                echo '<td>'.$count_todayconfirm.'</td></tr>';
            ?>
        </tbody>
    </table>
      <br><br><br>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="3">
      7일간 사망 현황
      </a>
      </div>
      </div>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
      <?php
                global $today;
                $sql_totaldeath = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `death date`");
                $sql_citizen = mysqli_query($con, "SELECT * FROM `citizen`");
                $count_citizen = mysqli_num_rows($sql_citizen);
                $count_totaldeath = mysqli_num_rows($sql_totaldeath);

                for ($i = 6; $i>= 0; $i -= 1) {
                    $day = date("m-d", strtotime("$today -$i day"));
                    echo '<th>'.$day.'</th>';
                }
                echo '<th>누적</th>';
                echo '<th>비율</th><tr>';
      ?>
        </thead>
        <tbody>
            <?php
                for ($i = 6; $i>= 0; $i -= 1) {
                    $day = date("Y-m-d", strtotime("$today -$i day"));
                    $sql_daydeath = mysqli_query($con, "SELECT * FROM `confirmed case` WHERE `death date` = '$day'");;
                    $count_daydeath = mysqli_num_rows($sql_daydeath);
                    echo '<td>'.$count_daydeath.'</td>';
                }
                echo '<td>'.$count_totaldeath.'</td>';
                $per = round(($count_totaldeath / $count_citizen) * 100, 2);
                echo '<td>'.$per.'%</td></tr>';           
            ?>
        </tbody>
    </table>
      <br><br><br>
    <table class="table table-hover table-bordered">
    <thead class="table-light">
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="4">
      7일 간 확진 현황
      </a>
      </div>
      </div>
      <br>
        <?php
                global $today;
                $sql_totaltest = mysqli_query($con, "SELECT * FROM `testing`");
                $sql_totalconfirm = mysqli_query($con, "SELECT * FROM `testing` WHERE `test result` = 1");
                $count_totaltest = mysqli_num_rows($sql_totaltest);
                $count_totalconfirm = mysqli_num_rows($sql_totalconfirm);

                for ($i = 6; $i>= 0; $i -= 1) {
                    $day = date("m-d", strtotime("$today -$i day"));
                    echo '<th>'.$day.'</th>';
                }
                echo '<th>누적</th>';
                echo '<th>비율</th><tr>';
        ?>
        </thead>
        <tbody>
            <?php
                for ($i = 6; $i>= 0; $i -= 1) {
                    $day = date("Y-m-d", strtotime("$today -$i day"));
                    $sql_dayconfirm = mysqli_query($con, "SELECT * FROM `testing` WHERE `test date` = '$day' AND `test result` = 1");;
                    $count_dayconfirm = mysqli_num_rows($sql_dayconfirm);
                    echo '<td>'.$count_dayconfirm.'</td>';
                }
                echo '<td>'.$count_totalconfirm.'</td>';
                $per = round(($count_totalconfirm / $count_citizen) * 100, 2);
                echo '<td>'.$per.'%</td></tr>'; 
            ?>
        </tbody>
    </table>
      <br><br><br>
      <div class="card" style="width:22rem;font-size:25px;">
      <div class="card-body">
      <a name="5">
      7일간 해외유입 확진자 현황
      </a>
      </div>
      </div>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
            <tr>
                <th>신규</th>
                <th>누적</th>
                <th>비율</th>
        </thead>
        <tbody>
            <?php
                global $today;
                $sql_totalimportconfirm = mysqli_query($con, "SELECT * FROM `testing` WHERE `test result` = 1 AND `imported case` = 1");
                $sql_todayimportconfirm = mysqli_query($con, "SELECT * FROM `testing` WHERE `test result` = 1 AND `test date` = '$today' AND `imported case` = 1");
                $count_totalimportconfirm = mysqli_num_rows($sql_totalimportconfirm);
                $count_todayimportconfirm = mysqli_num_rows($sql_todayimportconfirm);

                echo '<tr><td>'.$count_todayimportconfirm.'</td>';
                echo '<td>'.$count_totalimportconfirm.'</td>';
                $per = ($count_totalimportconfirm / $count_totalconfirm) * 100;
                echo '<td>'.$per.'%</td></tr>'; 
            ?>
        </tbody>
    </table>
      <br><br><br>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="6">
      시도별 발생 현황
      </a>
      </div>
      </div>
      <br>
      <table class="table table-hover table-bordered">
      <thead class="table-light">
                <th>구분</th>
                <th>검사</th>
                <th>확진</th>
                <th>입원</th>
                <th>중증</th>
                <th>사망</th>
        </thead>
        <tbody>
            <?php
                $sql_location = mysqli_query($con, "SELECT DISTINCT LEFT(`address`, 2) FROM `citizen`");
                echo '<tr><th>합계</th>';
                echo '<th>'.$count_totaltest.'</th>';
                echo '<th>'.$count_totalconfirm.'</th>';
                echo '<th>'.$count_totalhospital.'</th>';
                echo '<th>'.$count_severe.'</th>';
                echo '<th>'.$count_totaldeath.'</th></tr>';
                while ($row = mysqli_fetch_array($sql_location)) {
                    $sql_lotest = mysqli_query($con, "SELECT * FROM `testing` AS a LEFT JOIN `citizen` AS b ON a.`RRN_test` = b.`RRN` WHERE LEFT(`address`, 2) = '$row[0]'");
                    $sql_loconfirm = mysqli_query($con, "SELECT * FROM `testing` AS a LEFT JOIN `citizen` AS b ON a.`RRN_test` = b.`RRN` WHERE LEFT(`address`, 2) = '$row[0]' AND `test result` = 1");
                    $sql_lohospital = mysqli_query($con, "SELECT * FROM `confirmed case` AS a LEFT JOIN `citizen` AS b ON a.`RRN_confirmed` = b.`RRN` WHERE LEFT(`address`, 2) = '$row[0]' AND `room num`");
                    $sql_losevere = mysqli_query($con, "SELECT * FROM `confirmed case` AS a LEFT JOIN `citizen` AS b ON a.`RRN_confirmed` = b.`RRN` WHERE LEFT(`address`, 2) = '$row[0]' AND `severity` = 3");
                    $sql_lodeath = mysqli_query($con, "SELECT * FROM `confirmed case` AS a LEFT JOIN `citizen` AS b ON a.`RRN_confirmed` = b.`RRN` WHERE LEFT(`address`, 2) = '$row[0]' AND `death date`");
                    $count_lotest = mysqli_num_rows($sql_lotest);
                    $count_loconfirm = mysqli_num_rows($sql_loconfirm);
                    $count_lohospital = mysqli_num_rows($sql_lohospital);
                    $count_losevere = mysqli_num_rows($sql_losevere);
                    $count_lodeath = mysqli_num_rows($sql_lodeath);
                    echo '<tr><td>'.$row[0].'</td>';
                    echo '<td>'.$count_lotest.'</td>';
                    echo '<td>'.$count_loconfirm.'</td>';
                    echo '<td>'.$count_lohospital.'</td>';
                    echo '<td>'.$count_losevere.'</td>';
                    echo '<td>'.$count_lodeath.'</td></tr>';
                }
            ?>
        </tbody>
    </table>
    <br><br> <center> <input type="button" value="메인으로" onclick="location.href='GovernmentMain.php'"/> </center>
    </body>
</html>   