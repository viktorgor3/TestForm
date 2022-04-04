<?php
class CMyValidator extends CBitrixComponent{
    public $Vars;
    public $Rules;

    public function __construct(array $Vars) {
        $this->Vars = $Vars;
    }

    public function Expect($key, $rule) {
        $this->Rules[$key] = $rule;
    }

    public function Validate() {

        global $APPLICATION;

        foreach ($this->Rules as $key => $rule) {
            $rules = explode(",", $rule);

            foreach ($rules as $rule) {
                if (strstr($rule, "=")) {
                    $words = explode("=", $rule);
                    $rule = $words[0];
                    $rule_value = $words[1];
                }

                switch (strtoupper(trim($rule))) {

                    case "REQ" :
                    case "REQUIRED" : {
                        if (!isset($this->Vars [$key]))return false;

                        break;
                    }

                    case "NUM" :
                    case "NUMERIC" : {
                        if (isset($this->Vars[$key])) {
                            if (! is_numeric($this->Vars[$key])){
                                $APPLICATION->ThrowException("не верный формат");
                            } return false;
                        }
                        break;
                    }

                    case "MIN" :
                    case "MINIMUM" : {
                        if (isset($this->Vars[$key])) {
                            if (! is_numeric($this->Vars[$key])) return false;
                            if ($this->Vars[$key] < $rule_value){
                                $APPLICATION->ThrowException("слишком маленькое значение");
                            } return false;
                        }
                        break;
                    }

                    case "MAX" :
                    case "MAXIMUM" : {
                        if (isset($this->Vars[$key])) {
                            if (! is_numeric($this->Vars[$key])) return false;
                            if ($this->Vars[$key] > $rule_value){
                                $APPLICATION->ThrowException("слишком большое значение");
                            } return false;
                        }
                        break;
                    }

                    case "MIN_LEN" :
                    case "MIN_LENGTH" : {
                        if (isset($this->Vars[$key])) {
                            if (strlen($this->Vars[$key]) < $rule_value){
                                $APPLICATION->ThrowException("слишком маленькое значение");
                            } return false;
                        }
                        break;
                    }

                    case "MAX_LEN" :
                    case "MAX_LENGTH" : {
                        if (isset($this->Vars[$key])) {
                            if (strlen($this->Vars[$key]) > $rule_value){
                                $APPLICATION->ThrowException("слишком большое значение");
                            } return false;
                        }
                        break;
                    }

                    case "EMAIL" :
                    case "E-MAIL" : {
                        if (isset($this->Vars[$key])) {
                            if (! filter_var($this->Vars[$key], FILTER_VALIDATE_EMAIL)){
                                $APPLICATION->ThrowException("не верный формат");
                            } return false;
                        }
                        break;
                    }

                    case "PHONE" :
                    case "TELEPHONE" : {
                        if (isset($this->Vars[$key])) {
                            if(!preg_match("/#^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$#/", $this->Vars[$key])){
                                $APPLICATION->ThrowException("не верный формат");
                            } return false;
                        }
                        break;
                    }
                }
            }
        }

        return true;
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

$Validator = new MyValidator($_REQUEST);
$Validator->Expect("user_name", "REQ, MIN_LEN, MAX_LEN" );
$Validator->Expect("user_sourname", "REQ, MIN_LEN, MAX_LEN" );
$Validator->Expect("user_email", "REQ, EMAIL");
$Validator->Expect("user_date", "REQ, NUM, MIN, MAX");
$Validator->Expect("user_phone", "REQ, PHONE");
$Validator->Expect("user_city", "REQ, MIN_LEN, MAX_LEN");

$Validator->Validate();