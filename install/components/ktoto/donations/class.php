<?
/**
 * Created by Kto-to-eshe - 2023
 * @ Offers for full-time work: magicnotepad@yandex.ru
 * @ Technical support for the module, other questions: magicnotepad@gmail.com
 * @ https://www.1c-bitrix.ru/partners/18365340.php
 * @ https://kwork.ru/user/kto-to-eshe
 */

use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
 
class DonationYoomoneyComp extends CBitrixComponent {

    private function _checkModules() {
        if (!Loader::includeModule("ktoto.donations")) {
            throw new \Exception(GetMessage("KTOTO_DONATIONS_MODULE_ERROR_MSG"));
        }
        return true;
    }

    public function getModuleParams() {
        $options = \Ktoto\Donations\Options::getAll();
        if (empty($options["text"]) || empty($options["summ"]) || empty($options["invoice_yoomoney"])) {
            $options["MODULE_SETTINGS"] = "/bitrix/admin/settings.php?lang=ru&mid=ktoto.donations&mid_menu=1";
        }
        return $options;
    }

    public function executeComponent() {
        $this->_checkModules();
        
        $this->arResult["OPTIONS"] = $this->getModuleParams();

        $this->includeComponentTemplate();
    }
}

?>