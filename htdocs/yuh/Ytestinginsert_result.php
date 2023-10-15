<?php
$con=mysqli_connect("localhost", "root", "1234", "covid-19") or die("MySQL 접속 실패 !!");

$array = array($_POST["test_num"], $_POST["RRN_test"], $_POST["test_result"], $_POST["test_date"], $_POST["imported_case"]);
if(empty($array[0]))
{
    if(empty($array[2]))
    {
        $b =  0;
    }
    else
    {
        $b = 1;
    }

}
else if(empty($array[2]))
{
    $b = 2;
}
else
    $b = 3;

switch($b)
{
    case 0:
        $sql ="INSERT INTO `covid-19`.`testing` (`RRN_test`, `test date`, `imported case`, `test location`) VALUES ('$array[1]','$array[3]', $array[4], 'ynuh')";
        break;
    case 1:
        $sql ="INSERT INTO `covid-19`.`testing` (`RRN_test`, `test date`,`test result`, `imported case`, `test location`) VALUES ('$array[1]','$array[2]','$array[3]',$array[4], 'ynuh')";
        break;
    case 2:
        $sql ="INSERT INTO `covid-19`.`testing` (`test num`, `RRN_test`, `test date`, `imported case`, `test location`) VALUES ('$array[0]', '$array[1]','$array[3]',$array[4], 'ynuh')";
        break;
    case 3:
        $sql ="INSERT INTO `covid-19`.`testing` (`test num`, `RRN_test`, `test date`,`test result`, `imported case`, `test location`) VALUES ('$array[0]','$array[1]','$array[2]','$array[3]',$array[4], 'ynuh')";
        break;    
}

$ret = mysqli_query($con, $sql);

if(!$ret) {
	   echo "데이터 입력 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
         echo "<br><a href='Ytestinginsert.php'><--이전 화면</a>";
	exit();
}
else
{
    echo "검사 입력 성공! <br><br>";
    echo "<br><a href='Ytesting_all.php'><--이전 화면</a>";   
}


mysqli_close($con);

?>
