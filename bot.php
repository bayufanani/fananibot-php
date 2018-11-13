<?php 
define('BOT_TOKEN', getenv('TOKEN'));
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
	
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$text = $update["message"]['text'];

switch (strtolower($text)) {
  case 'hai' || 'hi' || 'halo':
    $balasan = balas('halo kakak');
    break;
  case 'assalamu\'alaikum' || 'assalamualaikum' :
    $balasan = balas('wa\'alaikumsalam wr. wb.');
    break;
  default:
    $balasan = balas('maaf saya gak paham. hehe 😅');
    break;
}
kirim($balasan);


// fungsi penting
function balas($text_balasan)
{
  return API_URL."sendmessage?chat_id=".$chatID."&text=".$text_balasan;
}

function kirim($pesan)
{
  file_get_contents($pesan);
}