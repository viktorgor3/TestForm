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
<div class="header_form">
    <div class="col_md-8">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php if(!empty($arResult["ERROR_MESSAGE"])):?>
                <?php foreach($arResult["ERROR_MESSAGE"] as $error):?>
                    <span class="text-danger"><?= $error;?></span><br>
                <?php endforeach;?>
            <?php elseif (!empty($arResult["OK_MESSAGE"])):?>
                <span class="text-success"><?=$arResult["OK_MESSAGE"]?></span><br>
            <?php endif;?>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<div class="container">
    <h1>Форма обратной связи</h1>
    <form role="form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
        <?=bitrix_sessid_post()?>
        <div class="form-group">
            <label for="user_name">Имя</label>
                <input type="text" class="form-control" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder='' <?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>/>
            <div class="form-group">
            <label for="user_sourname">Фамилия</label>
                <input type="text" class="form-control" name="user_sourname" value="<?=$arResult["AUTHOR_SOURNAME"]?>" placeholder='' <?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("SOURNAME", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>/>
            </div>
            <div class="form-group">
            <label for="user_email">Email</label>
                <input type="text" class="form-control" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder='' <?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>/>
            </div>
                <div class="form-group">
                <label for="user_date">Дата рождения</label>
                    <input type="date" class="form-control" name="user_date" value="<?=$arResult["AUTHOR_DATE"]?>" placeholder='' <?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("DATE", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>/>
                </div>
                <div class="form-group">
                <label for="user_phone">Телефон</label>
                    <input type="number" class="form-control" name="user_phone" id="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>" placeholder= '+7(___)___-__-__' <?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>/>
                    </div>
                <div class="form-group">
                <label for="user_city">Город</label>
                    <input type="text" class="form-control" name="user_city" value="<?=$arResult["AUTHOR_CITY"]?>" placeholder= '' <?=(empty($arParams["REQUIRED_FIELDS"]) || in_array("CITY", $arParams["REQUIRED_FIELDS"]))? '*' : '';?>/>
                </div>
            <input class="btn btn-success" type="submit" name="submit" placeholder="Отправить заявку" value="<?=GetMessage("MFT_SUBMIT")?>">
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        </div>
    </form>
</div>
</div>
<div class="footer_form"></div>