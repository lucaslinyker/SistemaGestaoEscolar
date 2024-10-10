<?php
//  NOTE:  Middleware Register or Update page

$referer = $_SERVER['HTTP_REFERER'];
$referer_path = parse_url($referer, PHP_URL_PATH);
$referer_file = basename($referer_path);
$tabela = substr($referer_file, 0, -4);

$params = '';
if (isset($_POST['id'])) {
  $arquivo = '../php/update.php';
  $params = 'id_old=' . $_GET['id_old'] . '&';
} else {
  $arquivo = '../php/register.php';
}

$params .= 'tabela=' . $tabela . '&';
foreach ($_POST as $key => $value) {
  $cleanValue = trim($value);
  $params .= $key . '=' . $cleanValue . '&';
}
$params = rtrim($params, '&');

header('Location: ' . $arquivo . '?' . $params);