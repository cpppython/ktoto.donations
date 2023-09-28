<?
/**
 * Created by Kto-to-eshe - 2023
 * @ Offers for full-time work: magicnotepad@yandex.ru
 * @ Technical support for the module, other questions: magicnotepad@gmail.com
 * @ https://www.1c-bitrix.ru/partners/18365340.php
 * @ https://kwork.ru/user/kto-to-eshe
 */

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\IO\Directory;

Loader::includeModule("main");
Loader::includeModule("iblock");

Loc::loadMessages(__FILE__);

class ktoto_donations extends CModule
{
    public $MODULE_ID = 'ktoto.donations'; 
    public $MODULE_ID_BD = "ktoto_donations";

    public function __construct()
    {
        $arModuleVersion = [];
        include __DIR__ . "/version.php";

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = GetMessage("KTOTO_DONATIONS_MODULE_NAME");
        $this->MODULE_DESCRIPTION = GetMessage("KTOTO_DONATIONS_MODULE_DESCRIPTION");
        $this->MODULE_GROUP_RIGHTS = "N";
        $this->MODULE_SORT = 1;
        $this->PARTNER_NAME = GetMessage("KTOTO_DONATIONS_PARTNER_NAME");
        $this->PARTNER_URI = GetMessage("KTOTO_DONATIONS_PARTNER_URI");
    }

    public function GetPath($notDocumentRoot=false)
    {
        if($notDocumentRoot)
            return str_ireplace(Application::getDocumentRoot(),"",dirname(__DIR__));
        else
            return dirname(__DIR__);
    }

    public function isVersionD7()
    {
        return CheckVersion(\Bitrix\Main\ModuleManager::getVersion("main"), "14.00.00");
    }
    
    public function DoInstall()
    {
        global $APPLICATION;
        if ($this->isVersionD7()) {
            ModuleManager::registerModule($this->MODULE_ID);
			$this->InstallFiles();
        }
        else 
        {
            $APPLICATION->ThrowException(GetMessage("KTOTO_DONATIONS_D7_ERROR"));
        }

        $APPLICATION->IncludeAdminFile(GetMessage("KTOTO_DONATIONS_INSTALL_STEP_PAGE_TITLE"), $this->GetPath()."/install/step.php");
    }
	
    public function DoUninstall()
    {
        global $APPLICATION;

        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();

        if($request["step"]<2)
        {
            $this->UnInstallFiles();
            \Bitrix\Main\Config\Option::delete($this->MODULE_ID_BD);
            ModuleManager::unRegisterModule($this->MODULE_ID);

            $APPLICATION->IncludeAdminFile(Loc::getMessage("ACADEMY_D7_UNINSTALL_TITLE"), $this->GetPath()."/install/unstep1.php");
        }
    }
	
    public function InstallFiles()
	{
		CopyDirFiles(
			$this->getPath()."/install/components/",
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/components/",
			true, true
		);
		return true;
	}
	public function UnInstallFiles()
	{
        \Bitrix\Main\IO\Directory::deleteDirectory($_SERVER["DOCUMENT_ROOT"]."/bitrix/components/ktoto/donations/");
		return true;
	}
}

?>