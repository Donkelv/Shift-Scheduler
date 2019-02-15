<?php
include_once('dbConnect.php');
include("login_function.php");
if(pf_check_number($_GET['id']) == TRUE) {
    $validid = $_GET['id'];
} else {
    echo 'Could Not Get The id Of The User';
}
$dns = array("194.204.159.1","194.204.152.34","8.8.8.8","8.8.4.4"); // or you can pass DNS from your first machine :)
$request = file_get_contents("http://nimot-clinic-api.herokuapp.com/api/shifts/?length=1");

$decode = json_decode($request, true);
$shifts = $decode['shifts'][0];

var_dump(json_decode($request, true));
$first0 = $shifts[0];
$first1 = $shifts[1];
$first2 = $shifts[2];
$first3 = $shifts[3];
$first4 = $shifts[4];
$first5 = $shifts[5];
$first6 = $shifts[6];
$first7 = $shifts[7];
$first8 = $shifts[8];
$first9 = $shifts[9];
$first10 = $shifts[10];
$first11 = $shifts[11];
$first12 = $shifts[12];
$first13 = $shifts[13];
$first14 = $shifts[14];
$first15 = $shifts[15];
$first16 = $shifts[16];
$first17 = $shifts[17];
$first18 = $shifts[18];
$first19 = $shifts[19];
$first20 = $shifts[20];
$first21 = $shifts[21];
$first22 = $shifts[22];
$first23 = $shifts[23];
$first24 = $shifts[24];
$first25 = $shifts[25];
$first26 = $shifts[26];
$first27 = $shifts[27];
$first28 = $shifts[28];
$first29 = $shifts[29];
$first30 = $shifts[30];
$month = $decode['month'];
$year = $decode['year'];

   
    $query = "INSERT INTO shift(userId, months,year,`1`,`2`,`3`,`4`,`5`,`6`,`7`,`8`,`9`,`10`,`11`,`12`,`13`,`14`,`15`,`16`,`17`,`18`,`19`,`20`,`21`,`22`,`23`,`24`,`25`,`26`,`27`,`28`,`29`,`30`,`31`) VALUES('$validid','$month','$year','$first0','$first1','$first2','$first3','$first4','$first5','$first6','$first7','$first8','$first9','$first10','$first11','$first12','$first13','$first14','$first15','$first16','$first17','$first18','$first19','$first20','$first21','$first22','$first23','$first24','$first25','$first26','$first27','$first28','$first29','$first30')";
    $result = $db->query($query);
    if($result){
        echo 'Successfully Added';
    } else {
        echo 'Having Problems Adding To Database';
    }






   

?>