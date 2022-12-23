<?php


use GuzzleHttp\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Viktor\PhpPro\Core\CLI\CommandHandler;
use Viktor\PhpPro\Core\CLI\Commands\TestCommand;
use Viktor\PhpPro\Core\ConfigHandler;
use Viktor\PhpPro\Core\Helpers\SingletonLogger;
use Viktor\PhpPro\Core\WEB\UrlController\UrlController;
use Viktor\PhpPro\Shortener\FileRepository;
use Viktor\PhpPro\Shortener\Helpers\UrlValidator;
use Viktor\PhpPro\Shortener\UrlConvertor;

require_once __DIR__ . '/../vendor/autoload.php';
//
//$pathParts = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
//
//$controllerClass = 'Viktor\PhpPro\Core\WEB\\' . ucfirst(array_shift($pathParts)) . 'Controller';
//
//$routingMap = [
//    UrlController::class => 'getShortcode'
//];
$configs = require_once __DIR__ . '/../parameters/config.php';
$configHandler = ConfigHandler::getInstance()->addConfigs($configs);
$commandHandler = new CommandHandler(new TestCommand());

$monolog = new Logger($configHandler->get('monolog.channel'));
$monolog->pushHandler(new StreamHandler($configHandler->get('monolog.level.error'), Level::Error))
    ->pushHandler(new StreamHandler($configHandler->get('monolog.level.info'), Level::Info));

$singletonLogger = SingletonLogger::getInstance($monolog);


$fileRepository = new FileRepository($configHandler->get('dbFile'));
$urlValidator = new UrlValidator(new Client());
$converter = new UrlConvertor(
    $fileRepository,
    $urlValidator,
    $configHandler->get('urlConverter.codeLength')
);
$url = $_GET['url'];
echo '<h1>your url: ' . $url . '</h1>';
echo "<br>";
echo '<h1> your ShortCode: ' . $converter->encode($url) . '</h1>';
//
//$urlConvertor = new UrlConvertor(new FileRepository('db.json'),new \Viktor\PhpPro\Shortener\Helpers\UrlValidator());
//$classObject = new UrlController($converter);
//
//$res = $classObject->getShortcode($url);
//echo $res;
///**
// * @var UrlController $urlController
// */
//try{
//    return true;
//    $method = $routingMap[$controllerClass];
//    echo $controllerClass->$routingMap->$pathParts;
//    $url = $_GET['url'];
////    $urlController = new UrlController($url);
//    echo $urlController->getShortcode($url);
//    echo UrlController::class->getShortcode($_GET['url']);


//    echo $urlConvertor->encode($_GET['url']);
//    $method = $routingMap[$controllerClass];
//    echo $method;
//} catch (TypeError $e) {
//    echo 'Invalid parameter: ' . $e->getMessage();
//    die();
//} catch (Exception) {
//    echo 'Routing not found';
//    die();
//}
//echo "<h1>" . $_SERVER['REQUEST_URI'] . "<h1/>";

//echo 'hello kity';
