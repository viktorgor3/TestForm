<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
use Bitrix\Main\localization\Loc;
?>

</div>
<form class="body-top" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
    <div class="text-alarm">
        <?php if(!empty($arResult["ERROR_MESSAGE"])):?>
            <?php foreach($arResult["ERROR_MESSAGE"] as $error):?>
                <span class="text-danger"><?= $error;?></span><br>
            <?php endforeach;?>
        <?php elseif (!empty($arResult["OK_MESSAGE"])):?>
            <span class="text-success"><?=$arResult["OK_MESSAGE"]?></span><br>
        <?php endif;?>
    </div>

    <div class="body-footer"></div>
    <div class="header-area">
        <h1 class="head">Форма обратной связи</h1>
        <div class="form-area">
            <h2>Имя</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="<?=Loc::getMessage("MFT_NAME")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Фамилия</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="user_sourname" value="<?=$arResult["AUTHOR_SOURNAME"]?>" placeholder="<?=Loc::getMessage("MFT_SOURNAME")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("SOURNAME", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Email</h2>
            <div class="ui-ctl ui-ctl-after-icon">
                <div class="ui-ctl-after ui-ctl-icon-mail"></div>
                <input type="text" class="ui-ctl-element ui-ctl-textbox" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="<?=Loc::getMessage("MFT_EMAIL")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Дата рождения</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="date" class="ui-ctl-element" name="user_date" value="<?=$arResult["AUTHOR_DATE"]?>" placeholder="<?=Loc::getMessage("MFT_DATE")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("DATE", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Номер телефона</h2>
            <div class="ui-ctl ui-ctl-after-icon">
                <div class="ui-ctl-after ui-ctl-icon-phone"></div>
                <input type="number" class="ui-ctl-element ui-ctl-textbox" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>" placeholder="<?=Loc::getMessage("MFT_PHONE")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Город</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="user_city" value="<?=$arResult["AUTHOR_CITY"]?>" placeholder="<?=Loc::getMessage("MFT_CITY")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("CITY", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <div class="button_style">
                <input class="ui-btn ui-btn-success ui-ctl-w100 ui-crm-nd" type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
            </div>
            <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        </div>
    </div>
</form>