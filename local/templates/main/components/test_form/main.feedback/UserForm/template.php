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
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if($arResult["OK_MESSAGE"] <> '')
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
    <?/*
	<div class="mf-name">
		<div class="mf-text">
			<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</div>
		<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
	</div>
	<div class="mf-email">
		<div class="mf-text">
			<?=GetMessage("MFT_PHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</div>
		<input type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>">
	</div>

	<div class="mf-message">
		<div class="mf-text">
			<?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
		</div>
		<textarea name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
	</div>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult[" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>
</div>
*/?>

<div class="body-top">
    <div class="body-footer"></div>
    <div class="header-area">
        <h1 class="head">Форма обратной связи</h1>
        <div class="form-area">
            <h2>Имя</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="Loc::<?=getMessage("MFT_NAME")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Фамилия</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="user_sourname" value="<?=$arResult["AUTHOR_SOURNAME"]?>" placeholder="Loc::<?=getMessage("MFT_SOURNAME")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("SOURNAME", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Email</h2>
            <div class="ui-ctl ui-ctl-after-icon">
                <div class="ui-ctl-after ui-ctl-icon-mail"></div>
                <input type="text" class="ui-ctl-element ui-ctl-textbox" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="Loc::<?=getMessage("MFT_EMAIL")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Дата рождения</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="date" class="ui-ctl-element" name="user_date" value="<?=$arResult["AUTHOR_DATE"]?>" placeholder="Loc::<?=getMessage("MFT_DATE")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("DATE", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Номер телефона</h2>
            <div class="ui-ctl ui-ctl-after-icon">
                <div class="ui-ctl-after ui-ctl-icon-phone"></div>
                <input type="phone" class="ui-ctl-element ui-ctl-textbox" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>" placeholder="Loc::<?=getMessage("MFT_PHONE")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <h2>Город</h2>
            <div class="ui-ctl ui-ctl-textbox ui-ctl-inline">
                <input type="text" class="ui-ctl-element" name="user_city" value="<?=$arResult["AUTHOR_CITY"]?>" placeholder="Loc::<?=getMessage("MFT_CITY")?><?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("CITY", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>"/>
            </div>
            <div class="button_style">
                <input class="ui-btn ui-btn-success ui-ctl-w100 ui-crm-nd" type="submit" name="submit" value="<?= GetMessage("MFT_SUBMIT")?>">
            </div>
            <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        </div>
    </div>
</div>
</form>
</div>