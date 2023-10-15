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
      <a href="#1" class="list-group-item list-group-item-action">백신 재고 현황</a>
      <a href="#2" class="list-group-item list-group-item-action">병원 백신 재고</a>
      <a href="#3" class="list-group-item list-group-item-action">제약사 백신 재고</a>
      <br>
    </div>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="1">
      백신 재고 현황
      </a>
      </div>
    </div>
    <br>
      <table class="table table-hover table-bordered">
          <thead class="table-light">
              <tr>
                  <th scope="col">구분</th>
                  <th scope="col">모더나</th>
                  <th scope="col">화이자</th>
              </tr>
          </thead>
          <tbody>
              <?php
                  $con = mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패");
                  
                  //병원 총 재고(병원 재고 테이블의 로트넘버를 조인하여 회사를 알아내어 모더나 일때 합을 m_cnt, 화이자 일때 합을 p_cnt로 둔다.)
                  $sql_h = "SELECT sum(case when B.company = '모더나' then A.quantity else 0 end) as m_cnt, sum(case when B.company = '화이자' then A.quantity else 0 end) as p_cnt
                  FROM `hospital inventory` as A
                  left outer join `vaccine information` as B on (A.lot_num=B.`lot num`)";
                  //제약사 총 재고
                  $sql_v="SELECT sum(case when B.company = '모더나' then A.quantity else 0 end) as m_cnt, sum(case when B.company = '화이자' then A.quantity else 0 end) as p_cnt
                  FROM inventory as A
                  left outer join `vaccine information` as B on (A.`lot number`=B.`lot num`)";

                  $tmpQty1=0;
                  $tmpQty2=0;
                  $result1 = mysqli_query($con, $sql_h); //병원 총 재고 sql을 result1로 저장
                  $result2 = mysqli_query($con, $sql_v); //제약사 총 재고 sql을 result2로 저장

                  while($row=mysqli_fetch_array($result1)) {
                      $tmpQty1 += $row['m_cnt']; //m_cnt를 모두 합하여 tmpqty1로 담는다
                      $tmpQty2 += $row['p_cnt']; //p_cnt를 모두 합하여 tmpqty2로 담는다
               
                  echo '<tr>
                  <th scope="row">병원</th>
                  <td>'.$row['m_cnt'].'</td>
                  <td>'.$row['p_cnt'].'</td>
                </tr>'; // 출력
                  } 
                  while($row=mysqli_fetch_array($result2)) {
                      $tmpQty1 += $row['m_cnt'];
                      $tmpQty2 += $row['p_cnt'];
                

                echo '<tr>
                <th scope="row">제약사</th>
                <td>'.$row['m_cnt'].'</td>
                <td>'.$row['p_cnt'].'</td>
              </tr>'; // 출력
                }
                
                  ?>
          </tbody>
          <tfoot>
              <?php
              echo '<tr>
              <th scope="row">합계</th>
              <td>'.$tmpQty1.'</td>
              <td>'.$tmpQty2.'</td>
            </tr>'; // 총 합계인 tmpqty 출력
            ?>
          </tfoot>
      </table>
      <br><br><br>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="2">
      병원 백신 재고
      </a>
      </div>
    </div>
      <br>
      <table class="table table-hover table-bordered">
          <thead class="table-light">
              <tr>
                  <th scope="col">병원이름</th>
                  <th scope="col">주소</th>
                  <th scope="col">전화번호</th>
                  <th scope="col">모더나</th>
                  <th scope="col">화이자</th>
              </tr>
          </thead>
          <tbody>
              <?php                
                  //병원 총 재고(병원 코드와 병원별 모더나 수, 화이자 수를 알아낸다. 병원을 그룹으로 하여 모더나일때 합과 화이자일 때 합을 계산)
                  $sql = "SELECT A.hospital__code as hos, sum(case when B.company = '모더나' then A.quantity else 0 end) as m_cnt, sum(case when B.company = '화이자' then A.quantity else 0 end) as p_cnt, C.`hospital name` as name, C.`address` as addr, C.`phone` as pn
                  FROM `hospital inventory` as A
                  left outer join `vaccine information` as B on (A.lot_num=B.`lot num`)
                  left outer join `hospital` as C on (A.hospital__code = C.`hospital code`)
                  group by A.hospital__code
                  order by A.hospital__code asc";

                  $tmpQty1=0;
                  $tmpQty2=0;
                  $result = mysqli_query($con, $sql);

                  while($row=mysqli_fetch_array($result)) {
                      $tmpQty1 += $row['m_cnt'];
                      $tmpQty2 += $row['p_cnt'];
                  

                  echo '<tr>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['addr'].'</td>
                  <td>'.$row['pn'].'</td>
                  <td>'.$row['m_cnt'].'</td>
                  <td>'.$row['p_cnt'].'</td>
                </tr>'; // 출력
                  }  
                  ?>              
          </tbody>
          <tfoot>
            <!-- 표하단  -->
              <?php
              echo '<tr>
              <th scope="row" colspan = "3">합계</th>
              <td>'.$tmpQty1.'</td>
              <td>'.$tmpQty2.'</td>
            </tr>'; //모든 병원의 합계인 tmpqty 출력
            ?>
          </tfoot>
      </table>
      <br><br><br>
      <div class="card" style="width:18rem;font-size:25px;">
      <div class="card-body">
      <a name="3">
      제약사 백신 재고
      </a>
      </div>
    </div>
    <br>
      <h4>모더나</h4>
      <table class="table table-hover table-bordered">
          <thead class="table-light">
              <tr>
                  <th scope="col">창고 코드</th>
                  <th scope="col">주소</th>
                  <th scope="col">수량</th>
              </tr>
          </thead>
          <tbody>
              <?php               
                  //제약사(모더나) 백신 재고(제약사 재고 테이블에서 모더나 일때 창고별 수량)
                  $sql= "SELECT A.warehouse_code as ware, max(B.address) as addrs, sum(A.quantity) as qty
                  FROM inventory as A
                  left outer join warehouse as B on (A.warehouse_code = B.`warehouse code`)
                  right outer join `vaccine information` as C on (C.`lot num`=A.`lot number`)
                  where C.company='모더나'
                  group by A.warehouse_code";

                  $tmpQty1=0;

                  $result = mysqli_query($con, $sql);
                
                  while($row=mysqli_fetch_array($result)){
                      $tmpQty1 += $row['qty']; //총 수량을 알기위해 qty의 합을 tmpqty1로 저장                          

                echo '<tr>
                <td>'.$row['ware'].'</td>
                <td>'.$row['addrs'].'</td>
                <td>'.$row['qty'].'</td>
              </tr>'; //창고코드, 주소, 수량 출력
                }
                  ?>
          </tbody>
          <tfoot>
              <?php
              echo '<tr>
              <th scope="row", colspan="2">합계</th>
              <td>'.$tmpQty1.'</td>
            </tr>'; //총 합계인 tmpqty1 하단에 출력
            ?>
          </tfoot>
      </table>  
      <h4>화이자</h4>
      <table class="table table-hover table-bordered">
          <thead class="table-light">
              <tr>
                  <th scope="col">창고 코드</th>
                  <th scope="col">주소</th>
                  <th scope="col">수량</th>
              </tr>
          </thead>
          <tbody>
              <?php                   
                  //제약사(모더나) 창고별 백신 재고
                  $sql= "SELECT A.warehouse_code as ware, max(B.address) as addrs, sum(A.quantity) as qty
                  FROM inventory as A
                  left outer join warehouse as B on (A.warehouse_code = B.`warehouse code`)
                  right outer join `vaccine information` as C on (C.`lot num`=A.`lot number`)
                  where C.company='화이자'
                  group by A.warehouse_code";

                  $tmpQty1=0;

                  $result = mysqli_query($con, $sql);


      
                  while($row=mysqli_fetch_array($result)){
                      $tmpQty1 += $row['qty']; // qty합 tmpqty1
                
                echo '<tr>
                <td>'.$row['ware'].'</td>
                <td>'.$row['addrs'].'</td>
                <td>'.$row['qty'].'</td>
              </tr>'; // 창고코드, 주소, 수량 출력
                }
                  ?>
          <tfoot>
              <?php
              echo '<tr>
              <th scope="row", colspan="2">합계</th>
              <td>'.$tmpQty1.'</td>
              </tr>'; // 총합계출력
              ?>
          </tfoot>        
          </tbody>
          
      </table>  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <br><br> <center> <input type="button" value="메인으로" onclick="location.href='GovernmentMain.php'" style="width:5%;"/> </center>
</html>