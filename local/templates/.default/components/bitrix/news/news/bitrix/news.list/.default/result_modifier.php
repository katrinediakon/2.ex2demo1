<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["SPECIALDATE"]=="Y")
{
    foreach ($arResult['ITEMS'] as $ITEM)
    {
        $APPLICATION->SetPageProperty("SPECIALDATE", $ITEM['DISPLAY_ACTIVE_FROM']);
    }
}