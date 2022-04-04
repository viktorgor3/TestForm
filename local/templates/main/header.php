<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
//\Bitrix\Main\UI\Extension::load("ui.forms");
//\Bitrix\Main\UI\Extension::load("ui.buttons");
\Bitrix\Main\UI\Extension::load("ui.bootstrap4");
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <title><?$APPLICATION->ShowTitle();?></title>
    <?php
    Asset::getInstance()->addCss("/bitrix/css/main/bootstrap.min.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH. '/assets/js/my_js.js');
//    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH. 'templates/main/css/style.css');
    ?>
    <?$APPLICATION->ShowHead();?>
</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>
<br>

