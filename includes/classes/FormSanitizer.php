<?php
class FormSanitizer {

public static function sanatizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = trim($inputText);
    $inputText = strtolower($inputText);
    $inputText = ucfirst($inputText);
    return $inputText;
    }

    public static function sanatizeFormUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }
    public static function sanatizeFormPassword($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }
    public static function sanatizeFormEmail($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }
}


?>