<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
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