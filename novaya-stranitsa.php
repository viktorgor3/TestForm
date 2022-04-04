<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
?>
<?php

//if (CModule::IncludeModule("form"))
//{
//	$arFilter = array("TYPE" => array("text", "textarea"));
//
//	$sType = "<b>".implode("</b>, <b>", $arFilter["TYPE"])."</b>";
//
//	$rsValidators = CFormValidator::GetAllList($arFilter);
//	if ($rsValidators->SelectedRowsCount() > 0)
//	{
//		echo "Найденные валидаторы для полей типа ".$sType.":<ul>";
//		while ($arValidator = $rsValidators->GetNext())
//		{
//			echo "<li>[".$arValidator["NAME"]."] ".$arValidator["DESCRIPTION"]."</li>";
//		}
//		echo "</ul>";
//	}
//	else
//	{
//		echo "Валидаторов, применимых к полям типа ".$sType." не обнаружено.";
//	}
//}
//else
//{
//	ShowError('Модуль веб-форм не установлен');
//}
?>
<?$APPLICATION->IncludeComponent(
	"test_form:main.feedback",
	"UserForm",
	Array(
		"EMAIL_TO" => "fsgdhdb@gffg.gfg",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "Спасибо, ваша заявка принята.",
		"REQUIRED_FIELDS" => array("NAME","SOURNAME","EMAIL","PHONE","DATE","CITY"),
		"USE_CAPTCHA" => "N"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>