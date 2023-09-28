<?
/**
 * Created by Kto-to-eshe - 2023
 * @ Offers for full-time work: magicnotepad@yandex.ru
 * @ Technical support for the module, other questions: magicnotepad@gmail.com
 * @ https://www.1c-bitrix.ru/partners/18365340.php
 * @ https://kwork.ru/user/kto-to-eshe
 */

namespace Ktoto\Donations; 

class Options
{
    static $moduleSettingsId = "ktoto_donations";

    static $optionsList = [
        "text",
        "summ",
        "invoice_yoomoney",
    ];

    public static function getAll()
    {
        $result = [];
        foreach (self::$optionsList as $option) {
            $result[$option] = self::get($option);
        }
        return $result;
    }

    public static function get($name)
    {
        return \Bitrix\Main\Config\Option::get(
            self::$moduleSettingsId,
            $name
        );
    }

    public static function setAll($params)
    {
        foreach ($params as $name => $value) {
            if (in_array($name, self::$optionsList)) {
                self::set($name, $value);
            }
        }
    }

    public static function set($name, $value)
    {
        \Bitrix\Main\Config\Option::set(self::$moduleSettingsId, $name, $value);
    }
}