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
<?$APPLICATION->IncludeComponent(
    "bitrix:main.feedback",
    "",
    Array(
        "EMAIL_TO" => "fsgdhdb@gffg.gfg",
        "EVENT_MESSAGE_ID" => array(),
        "OK_TEXT" => "Спасибо, ваша заявка принята.",
        "REQUIRED_FIELDS" => array("NAME", "EMAIL"),
        "USE_CAPTCHA" => "Y"
    )
);?><br>
<div class="body-top">
        <div class="body-footer"></div>
    <div class="header-area">
        <h1 class="head">Форма обратной связи</h1>
        <div class="form-area">
            <h2>Имя</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="name">
            </div>
            <h2>Фамилия</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="sourname">
            </div>
            <h2>Email</h2>
            <div class="ui-ctl ui-ctl-after-icon">
                <div class="ui-ctl-after ui-ctl-icon-mail"></div>
                <input type="text" class="ui-ctl-element ui-ctl-textbox" name="email">
            </div>
            <h2>Дата рождения</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="date" class="ui-ctl-element" name="birthday">
            </div>
            <h2>Номер телефона</h2>
            <div class="ui-ctl ui-ctl-after-icon">
                <div class="ui-ctl-after ui-ctl-icon-phone"></div>
                <input type="phone" class="ui-ctl-element ui-ctl-textbox" name="phone">
            </div>
            <h2>Город</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="city">
            </div>
            <div class="button_style">
                <button class="ui-btn ui-btn-success ui-ctl-w100 ui-crm-nd" >Отправить заявку</button>
            </div>
        </div>
    </div>
</div>
