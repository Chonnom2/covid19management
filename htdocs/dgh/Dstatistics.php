<!DOCTYPE html>
<html lang = "ko">
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
<title>대구병원</title>

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
    <a class="logo" href="dgh.php">Covid-19 종합 관리 시스템(대구병원)</a>
    <nav class="nav">
      <ul>
      </ul>
    </nav>
  </header>

<?php
    $con = mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패!!");

$sql = "SELECT * FROM `hospital room` WHERE `hospital_code`='dgh'";

$ret = mysqli_query($con, $sql);
if ($ret) {
    $count = mysqli_num_rows($ret);
}
else {
    echo "confirmedcase 데이터 조회 실패!!!", "<br>";
    echo "실패 원인 : ".mysqli_error($con);
    exit();
}
$i = 0;
$in = 0;
$j = 0;
$jn = 0;

while ($row = mysqli_fetch_array($ret)) {
    if ($row['type'] == "일반병실") {
        $i += $row['capacity'];
        $in += $row['current number'];
    }
    if ($row['type'] == "중환자실") {
        $j += $row['capacity'];
        $jn += $row['current number'];
    }
}
$iaverage = $in / $i * 100;
$iaverage = sprintf('%0.2f', $iaverage);
$javerage = $jn / $j * 100;
$javerage = sprintf('%0.2f', $javerage);
$in = $i - $in;
$jn = $j - $jn;



$sql = "SELECT * FROM `covid-19`.`hospital room` JOIN `covid-19`.`confirmed case` ON `hospital room`.`room num` = `confirmed case`.`room num` WHERE `hospital_code` = 'dgh'";

$ret = mysqli_query($con, $sql);
if ($ret) {
    $count = mysqli_num_rows($ret);
}
else {
    echo "confirmedcase 데이터 조회 실패!!!", "<br>";
    echo "실패 원인 : ".mysqli_error($con);
    exit();
}
$d = 0;
$n = 0;
$dcount = 0;
$ncount = 0;
$today = date("Y-m-d");
$s2 = 0; $today_s2 = 0;
$s3 = 0; $today_s3 = 0;
while ($row = mysqli_fetch_array($ret)) {
    if ($row['death date'] == $today)
        $d++;
    if ($row['death date'] != NULL)
        $dcount++;
    if ($row['hospitalization date'] == $today && $row['discharge date'] == NULL && $row['death date'] == NULL)
        $n++;
    if ($row['hospitalization date'] != NULL && $row['discharge date'] == NULL && $row['death date'] == NULL)
        $ncount++;
    if ($row['severity'] == 2 && $row['discharge date'] == NULL && $row['death date'] == NULL)
    {
        if($row['hospitalization date'] == $today)
        {
            $today_s2++;
            $s2++;
        }
        else
            $s2++;
    }
    if ($row['severity'] == 3 && $row['discharge date'] == NULL && $row['death date'] == NULL)
    {
        if($row['hospitalization date'] == $today)
        {
            $today_s3++;
            $s3++;
        }
        else
            $s3++;
    }
}
?>
    <br>
    <div class="card" style="width:22rem;font-size:25px;">
      <div class="card-body">
      대구병원 코로나 환자 현황
      </div>
      </div>
    <br>

<section class = "section intro">
<center><table class='table table-hover table-bordered'><thead class='table-light'>
<tr>
<th><center>구분</th>
<th><center>사망자</th>
<th><center>입원자</th>
<th><center>일반환자</th>
<th><center>중환자</th>
</tr>
</thead>
<tr>
<td><center>일일</td>
<td>
<?php echo "<center>","$d";?>
</td>
<td>
<?php echo "<center>","$n";?>
</td>
<td>
<?php echo "<center>","$today_s2";?>
</td>
<td>
<?php echo "<center>","$today_s3";?>    
</td>
</tr>

<tr>
<td><center>전체</td>
<td>
<?php echo "<center>","$dcount";?>
</td>
<td>
<?php echo "<center>","$ncount";?>
</td>
<td>
<?php echo "<center>","$s2";?>
</td>
<td>
<?php echo "<center>","$s3";?>
</td>
</tr>
</table>
<br><br><br></center>
    <div class="card" style="width:22rem;font-size:25px;">
      <div class="card-body">
      대구병원 병상 현황
      </div>
      </div>
    <br>
<center><table class='table table-hover table-bordered'><thead class='table-light'>
<tr>
<th><center>구분</th>
<th><center>가동률</th>
<th><center>보유병상</th>
<th><center>가용병상</th>
</tr>
</thead>

<tr>
<th><center>중환자병상</th>
<th>
<?php echo  "<center>", "$javerage %";?>
</th>
<th>
<?php echo  "<center>", "$j";?>
</th>
<th>
<?php echo  "<center>", "$jn";?>
</th>
</tr>

<tr>
<th><center>일반병상</th>
<th>
<?php echo  "<center>", "$iaverage %";?>
</th>
<th>
<?php echo  "<center>", "$i";?>
</th>
<th>
<?php echo  "<center>", "$in";?>
</th>
</tr>
</table>

</form>
</p>


</table>
</div>
<br>
</main>
<br><br> <center> <input type="button" value="메인으로" onclick="location.href='dgh.php'" style="width:5%;height:50%"/> </center>
</body>
</html>