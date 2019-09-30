<?php

function get_matches(){
$ch = curl_init();
$list= array();
curl_setopt($ch, CURLOPT_URL, 'https://api.gotinder.com/v2/matches?count=60&is_tinder_u=true&locale=fr&message=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'X-Auth-Token: '.$Token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$len=count($result);

$result = json_decode(curl_exec($ch),true);
//print_r($result);
$len=count($result['data']['matches']);
//echo $len;
for($i=0;$i<$len;$i++){
  echo "Message Count: ".$result['data']['matches'][$i]['message_count']." Name: ".$result['data']['matches'][$i]['person']['name']." Common Friends: ".$result['data']['matches'][$i]['common_friend_count']."\n";
 //array_push($list,$result['data']['matches'][$i]['_id']);
}
/*foreach($result['data']['matches'] as $ma ){
  var_dump($ma['dead']);
}*/
curl_close($ch);
//return $list;


}

function send_Message($id){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.gotinder.com/user/matches/'.$id);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"message":"heey"}');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Origin: https://tinder.com';
  $headers[] = 'App-Session-Time-Elapsed: 688234';
  $headers[] = 'X-Auth-Token: '.$Token;
  $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36';
  $headers[] = 'Content-Type: application/json';

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  echo $result."\n ";
  curl_close($ch);
}
get_matches()
//print_r(get_matches());
//foreach(get_matches() as $id){
//  send_Message($id);
//}

?>
