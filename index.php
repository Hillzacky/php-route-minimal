<?php if(!isset($_SESSION)) session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('URI', $_SERVER['REQUEST_URI']);

function host(){
  return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
}

$path = parse_url(URI, PHP_URL_PATH);
$uri = isset($path) ? substr($path,1) : '';
$url = explode('/',$uri);

switch($url[0]){
  case 'about':
    $route = ROOT.'/about.php';
    break;
  default:
    $route = ($url[0]=='') ? ROOT.'/home.php' : ROOT.'/error.php';
    break;
}

if(file_exists($route)) include $route;exit;
setlocale(LC_ALL, 'en_US.UTF8');
