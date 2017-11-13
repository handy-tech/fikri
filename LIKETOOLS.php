<?php
###########################################################################################################################################
/* CONTOH SCRIPT */
/* EXAMPLE */
###########################################################################################################################################
//Ini API.php
set_time_limit(0);
ignore_user_abort(1);
$usernameig = "handy_xyzofficial"; //Ganti ... Dengan Username ig mu
$passwordig = "Password mu disini"; 
    function proccess($ighost, $useragent, $url, $cookie = 0, $data = 0, $httpheader = array(), $proxy = 0){
    $url = $ighost ? 'https://i.instagram.com/api/v1/' . $url : $url;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    if($proxy):
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
    endif;
    if($httpheader) curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if($cookie) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    if ($data):
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    endif;
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch);
    if(!$httpcode) return false; else{
      $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
      $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
      curl_close($ch);
      return array($header, $body);
    }
  }


function SendRequest($url, $post, $post_data, $user_agent, $cookies) {
    $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://instagram.com/api/v1/'.$url);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: id'));

  if($post) {
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  }
 
  if($cookies) {
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'likefeed.txt');
  } else {
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'likefeed.txt');
  }
 
  $response = curl_exec($ch);
  $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
 
  return array($http, $response);
}

function GenerateGuid() {
  return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      mt_rand(0, 65535),
      mt_rand(0, 65535),
      mt_rand(0, 65535),
      mt_rand(16384, 20479),
      mt_rand(32768, 49151),
      mt_rand(0, 65535),
      mt_rand(0, 65535),
      mt_rand(0, 65535));
}
