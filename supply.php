<?php  $timezone = "Asia/Calcutta";
date_default_timezone_set($timezone); 

$decimal=1000000000000000000;

$supply="https://api.bscscan.com/api?module=stats&action=tokensupply&contractaddress=0x335f6e0e804b70a96bf9eb8af31588942e9b2515&apikey=R48AKCQDIRCSYY42CC16J6FFE4RRCEDZRR";
$supplycurl = curl($supply);
$data=json_decode($supplycurl);
$total=$data->result/$decimal;
 

$locker1="https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=0x335f6e0e804b70a96bf9eb8af31588942e9b2515&address=0x52f218c86e6cacdaf47e011b64a2a0b585a46c65&tag=latest&apikey=R48AKCQDIRCSYY42CC16J6FFE4RRCEDZRR";
$locker1curl = curl($locker1);
$datal1=json_decode($locker1curl);
$loc1=$datal1->result/$decimal;

$locker2="https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=0x335f6e0e804b70a96bf9eb8af31588942e9b2515&address=0x65220a04b9e5a5c3c36c17367adccff5ffcae4eb&tag=latest&apikey=R48AKCQDIRCSYY42CC16J6FFE4RRCEDZRR";
$locker2curl = curl($locker2);
$datal2=json_decode($locker2curl);
$loc2=$datal2->result/$decimal;
$locker=$loc1+$loc2;


$burns="https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=0x335f6e0e804b70a96bf9eb8af31588942e9b2515&address=0x000000000000000000000000000000000000dead&tag=latest&apikey=R48AKCQDIRCSYY42CC16J6FFE4RRCEDZRR";
$burncurl = curl($burns);
$databurn=json_decode($burncurl);
$burn=$databurn->result/$decimal;

$totalSupply=$total-$burn;

$myObj = new stdClass();
// $myObj->maxsupply = "1000,000,000";
// $myObj->locker = $locker;
$myObj->totalSupply = $totalSupply;
$myObj->burnedSupply = $burn;
$myObj->circulatingSupply = $totalSupply-$locker;


$myJSON = json_encode($myObj);

echo $myJSON;

// 293144198499156690630120349
// 82000000000000000000000000
// 35000000000000000000000000
// 1036511295757263266693361
?>








<?php  function curl($url){

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);

curl_close($ch);

return $data;

}  ?>

