<?php
error_reporting(-1);
ini_set('display_errors', 'On');
$f = fopen("tempactivitylog.txt", "w");
echo "HelloWorld!";
/*
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
$api_dev_key 			= '2a42e9be6e5af65ce24128d4162890e1'; // your api_developer_key
$api_paste_code 		= $_GET['data']; // your paste text
$api_paste_private 		= '1'; // 0=public 1=unlisted 2=private
$api_paste_name			= $_GET['name']; // name or title of your paste
$api_paste_expire_date 		= '10M';
$api_paste_format 		= 'text';
$api_user_key 			= ''; // if an invalid api_user_key or no key is used, the paste will be create as a guest
$api_paste_name			= urlencode($api_paste_name);
$api_paste_code			= urlencode($api_paste_code);


$url 				= 'http://pastebin.com/api/api_post.php';
$ch 				= curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'api_option=paste&api_user_key='.$api_user_key.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format.'&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);

$response  			= curl_exec($ch);
echo "%pastebinresponse%";
echo $response;
echo "%pastebinresponse%";*/
?>
