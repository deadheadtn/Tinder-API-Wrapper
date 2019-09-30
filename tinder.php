<?php
class Tinder{

  Private $token;
  function __construct( $token ) {
		$this->token = $token;
	}

  function get_matches(){
  $ch = curl_init();
  $list= array();
  curl_setopt($ch, CURLOPT_URL, 'https://api.gotinder.com/v2/matches?count=60&is_tinder_u=true&locale=fr&message=1');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  $headers = array();
  $headers[] = 'X-Auth-Token: '.$this->token;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $len=count($result);

  $result = json_decode(curl_exec($ch),true);
  //print_r($result);
  $len=count($result['data']['matches']);
  //echo $len;
  for($i=0;$i<$len;$i++){
    //echo "Message Count: ".$result['data']['matches'][$i]['message_count']." Name: ".$result['data']['matches'][$i]['person']['name']." Common Friends: ".$result['data']['matches'][$i]['common_friend_count']."\n";
   array_push($list,$result['data']['matches'][$i]['_id']);
  }
  /*foreach($result['data']['matches'] as $ma ){
    var_dump($ma['dead']);
  }*/
  curl_close($ch);
  return $list;
  }

  function send_Message($id,$message){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.gotinder.com/user/matches/'.$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"message":"'.$message.'"}');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $headers = array();
    $headers[] = 'X-Auth-Token: '.$this->token;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    echo $result."\n ";
    curl_close($ch);
  }
}
?>
