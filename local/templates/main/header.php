<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
\Bitrix\Main\UI\Extension::load("ui.forms");
\Bitrix\Main\UI\Extension::load("ui.buttons");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?$APPLICATION->ShowHead();?>

    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />


    <title><?$APPLICATION->ShowTitle();?></title>
</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>
<br>
<?//$APPLICATION->IncludeComponent(
//    "test_form:main.feedback",
//    "UserForm",
//    Array(
//        "EMAIL_TO" => "fsgdhdb@gffg.gfg",
//        "EVENT_MESSAGE_ID" => array(),
//        "OK_TEXT" => "Спасибо, ваша заявка принята.",
//        "REQUIRED_FIELDS" => array("NAME","SOURNAME","EMAIL","PHONE","DATE","CITY"),
//        "USE_CAPTCHA" => "N"
//    )
//);?>

