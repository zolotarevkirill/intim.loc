<?
global $MESS;
IncludeModuleLangFile(__FILE__);

Class imyie_chpurizator extends CModule
{
    var $MODULE_ID = "imyie.chpurizator";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function imyie_chpurizator()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");
	
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        } else {
            $this->MODULE_VERSION = "1.0.0";
            $this->MODULE_VERSION_DATE = "2012.01.01";
        }

		$this->MODULE_NAME = GetMessage("IMYIE_MODULES_INSTALL_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("IMYIE_MODULES_INSTALL_DESCRIPTION");
		$this->PARTNER_NAME = GetMessage("IMYIE_MODULES_INSTALL_COPMPANY_NAME");
        $this->PARTNER_URI  = "http://imyie.ru/";
	}

	// Install functions
	function InstallDB()
	{
		global $DB, $DBType, $APPLICATION;
		RegisterModule("imyie.chpurizator");
		return TRUE;
	}

	function InstallFiles()
	{
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/imyie.chpurizator/install/copyfiles/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/imyie.chpurizator/install/copyfiles/themes", $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes", true, true);
		return TRUE;
	}

	function InstallPublic()
	{
		return TRUE;
	}

	function InstallEvents()
	{
		return TRUE;
	}

	// UnInstal functions
	function UnInstallDB($arParams = Array())
	{
		
		global $DB, $DBType, $APPLICATION;
		UnRegisterModule("imyie.chpurizator");
		return TRUE;
	}

	function UnInstallFiles()
	{
		DeleteDirFilesEx("/bitrix/themes/.default/icons/imyie.chpurizator");
		DeleteDirFilesEx("/bitrix/themes/.default/imyie.chpurizator.css");
		DeleteDirFilesEx("/bitrix/admin/imyie_chpurizator.php");
		return TRUE;
	}

	function UnInstallPublic()
	{
		return TRUE;
	}

	function UnInstallEvents()
	{
		return TRUE;
	}

    function DoInstall()
    {
		global $APPLICATION, $step;
		$keyGoodFiles = $this->InstallFiles();
		$keyGoodDB = $this->InstallDB();
		$keyGoodEvents = $this->InstallEvents();
		$keyGoodPublic = $this->InstallPublic();
		$APPLICATION->IncludeAdminFile(GetMessage("SPER_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/imyie.chpurizator/install/install.php");
    }

    function DoUninstall()
    {
		global $APPLICATION, $step;
		$keyGoodFiles = $this->UnInstallFiles();
		$keyGoodDB = $this->UnInstallDB();
		$keyGoodEvents = $this->UnInstallEvents();
		$keyGoodPublic = $this->UnInstallPublic();
		$APPLICATION->IncludeAdminFile(GetMessage("SPER_UNINSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/imyie.chpurizator/install/uninstall.php");
    }
}
?>