<?php
//Обработчик в файле /bitrix/php_interface/init.php
AddEventHandler("main", "OnBeforeEventAdd", array("MyClass", "OnBeforeEventAddHandler"));

class MyClass
{
    function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
    {
        global $USER;
        if ($event == "FEEDBACK_FORM"):
            $massege = "Пользователь не авторизован,";
            if ($USER->GetID()):
                $massege = "Пользователь авторизован: " . $USER->GetID() . " (" . ($USER->GetLogin()) . "} " . $USER->GetFullName();
                CEventLog::Add(array(
                    "SEVERITY" => "SECURITY",
                    "AUDIT_TYPE_ID" => "MY_OWN_TYPE",
                    "MODULE_ID" => "main",
                    "ITEM_ID" => 123,
                    "DESCRIPTION" => "Замена данных в отсылаемом письме – $massege, данные из формы: " . $arFields['AUTHOR'],
                ));
            endif;

            $arFields['AUTHOR'] = $massege . ", данные из формы: " . $arFields['AUTHOR'];

        endif;
    }
}

?>