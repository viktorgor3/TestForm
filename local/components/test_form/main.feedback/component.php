<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"]=== $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();

	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
            $cMyVal = new CMyValidator();
            $cMyVal->setData($_POST);
            $cMyVal->Expect("user_name", "REQ");
            $cMyVal->Expect("user_sourname", "REQ");
            $cMyVal->Expect("user_email", "REQ");
            $cMyVal->Expect("user_date", "REQ");
            $cMyVal->Expect("user_phone", "REQ");
            $cMyVal->Expect("user_city", "REQ");
            $arResult=$cMyVal->Validate();
            GetMessage($arResult);
//        echo "<pre>".print_r($arResult, 1)."</pre>";
//			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_name"]) <= 1 && $MyArr == array('error'))
//				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
//            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("SOURNAME", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_sourname"]) <= 1 && $MyArr == array('error'))
//                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_SOURNAME");
//			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_email"]) <=1 && $MyArr == array('error'))
//				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
//            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("DATE", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_date"]) <= 1&& $MyArr == array('error'))
//                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_DATE");
//            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && empty($_POST["user_phone"]) && isset($MyArr['error']))
//                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
//            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("CITY", $arParams["REQUIRED_FIELDS"]))&& mb_strlen($_POST["user_city"]) <= 1 && $MyArr['error'])
//                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_CITY");
		}
//		if(mb_strlen($_POST["user_email"]) > 1 && !check_email($_POST["user_email"]))
//			$arResult["ERROR_MESSAGE"][] = GetMessage("MF_EMAIL_NOT_VALID");

		if($arParams["USE_CAPTCHA"] == "Y")
		{
			$captcha_code = $_POST["captcha_sid"];
			$captcha_word = $_POST["captcha_word"];
			$cpt = new CCaptcha();
			$captchaPass = COption::GetOptionString("main", "captcha_password", "");
			if ($captcha_word <> '' && $captcha_code <> '')
			{
				if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
					$arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
			}
			else
				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTHCA_EMPTY");

		}			
		if(empty($arResult["ERROR_MESSAGE"]))
		{
			$arFields = Array(
				"AUTHOR" => $_POST["user_name"],
                "SOURNAME" => $_POST["user_sourname"],
                "DATE" => $_POST["user_date"],
				"AUTHOR_EMAIL" => $_POST["user_email"],
                "PHONE" => $_POST["user_phone"],
				"EMAIL_TO" => $arParams["EMAIL_TO"],
				"CITY" => $_POST["user_city"],
			);
			if(!empty($arParams["EVENT_MESSAGE_ID"]))
			{
				foreach($arParams["EVENT_MESSAGE_ID"] as $v)
					if(intval($v) > 0)
						CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", intval($v));
			}
			else
				CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
			$_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
            $_SESSION["MF_SOURNAME"] = htmlspecialcharsbx($_POST["user_sourname"]);
			$_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
            $_SESSION["MF_DATE"] = htmlspecialcharsbx($_POST["user_date"]);
            $_SESSION["MF_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
            $_SESSION["MF_CITY"] = htmlspecialcharsbx($_POST["user_city"]);
			LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
		}

		$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
        $arResult["AUTHOR_SOURNAME"] = htmlspecialcharsbx($_POST["user_sourname"]);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
        $arResult["AUTHOR_DATE"] = htmlspecialcharsbx($_POST["user_date"]);
        $arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
        $arResult["AUTHOR_CITY"] = htmlspecialcharsbx($_POST["user_city"]);
	}
	else
		$arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
}
elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if(empty($arResult["ERROR_MESSAGE"]))
{
//	if($USER->IsAuthorized())
//	{
//		$arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
//		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
//	}
//	else
//	{
//		if($_SESSION["MF_NAME"] <> '')
//			$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
//		if($_SESSION["MF_EMAIL"] <> '')
//			$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
//	}
}

if($arParams["USE_CAPTCHA"] == "Y")
	$arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();
