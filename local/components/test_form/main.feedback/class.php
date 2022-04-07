<?php
class CMyValidator extends CBitrixComponent{
    public $Vars ;
    public $Rules;

    public function setData(array $vars) {
        $this->Vars = $vars;
    }

    public function Expect($key, $rule) {
        $this->Rules[$key] = $rule;
    }

    public function Validate()
    {
        $arResult = [];

        foreach ($this->Rules as $key => $rule) {
            $rules = explode(",", $rule);

            foreach ($rules as $rule) {
                if (strstr($rule, "=")) {
                    $words = explode("=", $rule);
                    $rule = $words[0];
                    $rule_value = $words[1];
                }
                if (isset($this->Vars[$key])) {
                    switch (strtoupper(trim($rule))) {
                        case "REQ" :
                        case "REQUIRED" :
                        {
                            switch ($key) {
                                case "user_name":
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
//                                    echo "<pre>".print_r($arResult, 1)."</pre>";
                                    break;
                                case "user_sourname":
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_SOURNAME");
                                    break;
                                case "user_email":
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
                                    break;
                                case "user_date":
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_DATE");
                                    break;
                                case "user_phone":
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
                                    break;
                                case "user_city":
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_CITY");
                                    break;
                            }
                            break;
                        }
                        case "NUM" :
                        case "NUMERIC" :
                        {
                            if (!is_numeric($this->Vars[$key])||!preg_match('/^[0-9]{10,10}$/', $key === "user_phone")){
                                if ($key === "user_phone"){
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
                                } elseif ($key === "user_date") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_DATE");
                                }
                            }
                            break;
                        }
                        case "MIN" :
                        case "MINIMUM" :
                        {
                            if (!is_numeric($this->Vars[$key]) && isset($rule_value) && $this->Vars[$key] < $rule_value) {
                                if ($key === "user_phone") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
                                }
                            }
                            break;
                        }
                        case "MAX" :
                        case "MAXIMUM" :
                        {
                            if (!is_numeric($this->Vars[$key]) && isset($rule_value) && $this->Vars[$key] > $rule_value) {
                                if ($key === "user_phone") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
                                }
                            }
                            break;
                        }
                        case "MIN_LEN" :
                        case "MIN_LENGTH" :
                        {
                            if (strlen($this->Vars[$key]) < $rule_value) {
                                if ($key === "user_name") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
                                } elseif ($key === "user_sourname") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_SOURNAME");
                                } elseif ($key === "user_city") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_CITY");
                                }
                            }
                            break;
                        }
                        case "MAX_LEN" :
                        case "MAX_LENGTH" :
                        {
                            if (strlen($this->Vars[$key]) > $rule_value) {
                                if ($key === "user_name") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
                                } elseif ($key === "user_sourname") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_SOURNAME");
                                } elseif ($key === "user_email") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
                                } elseif ($key === "user_city") {
                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_CITY");
                                }
                            }
                            break;
                        }
                        case "EMAIL" :
                        case "E-MAIL" :
                        {
                            if (isset($this->Vars[$key])) {
                                if (!filter_var($this->Vars[$key], FILTER_VALIDATE_EMAIL)) {
                                    if ($key === "user_email") {
                                        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
                                    }
                                }
                                break;
                            }
                        }
//                        case "PHONE" :
//                        case "TELEPHONE" :
//                        {
//                            if (!preg_match('/^[0-9]{10}$/', $this->Vars[$key])) {
//                                if ($key === "user_phone") {
//                                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
//                                }
//                            }
//                            break;
//                        }
                    }
                }
            }
        }
        return $arResult;
    }
    public function __get($var) {
        if (isset($this->$var)) {
            return $this->$var;
        } else {
            if (isset($this->Vars[$var])) {
                return $this->Vars[$var];
            }
        }
        return NULL;
    }
}