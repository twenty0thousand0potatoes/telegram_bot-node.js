<?php
	$thanks = 'index.html'; // страница спасибо

	function AsField($name, $parameter)
	{
		if(!isset($_REQUEST[$parameter])) return '';
		$value = $_REQUEST[$parameter];
		return "<strong>$name:</strong> $value<br>";
	}


	$server = $_SERVER['HTTP_HOST'];
	$ip = $_SERVER['REMOTE_ADDR'];



//tg

$headFieldset = "Короткая заявка  ".$server;
$head = $ip;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['client_phone1'])){
  if (isset($_POST['client_fam'])) {
    if (!empty($_POST['client_fam'])){
  $clientfam = strip_tags($_POST['client_fam']);
  $clientfamFieldset = "Фамилия: ";
  }
}
if (isset($_POST['client_name'])) {
  if (!empty($_POST['client_name'])){
  $clientname = strip_tags($_POST['client_name']);
  $clientnameFieldset = "Имя: ";
  }
}
if (isset($_POST['client_ot'])) {
  if (!empty($_POST['client_ot'])){
  $clientot = strip_tags($_POST['client_ot']);
  $clientotFieldset = "Отчество: ";
  }
}
if (isset($_POST['client_phone1'])) {
  if (!empty($_POST['client_phone1'])){
  $clientphone1 = strip_tags($_POST['client_phone1']);
  $clientphone1Fieldset = "Телефон: ";
  }
}
if (isset($_POST['source'])) {
  if (!empty($_POST['source'])){
  $source = strip_tags($_POST['source']);
  $sourceFieldset = "source: ";
  }
}
if (isset($_POST['type'])) {
  if (!empty($_POST['type'])){
  $type = strip_tags($_POST['type']);
  $typeFieldset = "type: ";
  }
}
if (isset($_POST['medium'])) {
  if (!empty($_POST['medium'])){
  $medium = strip_tags($_POST['medium']);
  $mediumFieldset = "medium: ";
  }
}
if (isset($_POST['campaign'])) {
  if (!empty($_POST['campaign'])){
  $campaign = strip_tags($_POST['campaign']);
  $campaignFieldset = "campaign: ";
  }
}
if (isset($_POST['content'])) {
  if (!empty($_POST['content'])){
  $content = strip_tags($_POST['content']);
  $contentFieldset = "content: ";
  }
}
if (isset($_POST['term'])) {
  if (!empty($_POST['term'])){
  $term = strip_tags($_POST['term']);
  $termFieldset = "term: ";
  }
}

$token = "6411338976:AAH5Ucnk-unCP5Q7QV6589aFrjz2p0T2NxI";
$chat_id = "-1001969688974";

$arr = array(
  $headFieldset => $head,
  $clientfamFieldset => $clientfam,
  $clientnameFieldset => $clientname,
  $clientotFieldset => $clientot,
  $clientphone1Fieldset => $clientphone1
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header("Location: $thanks");
  exit; // Завершение выполнения скрипта
} else {
  echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
}


?>
