<?
global $DB, $MESS, $APPLICATION, $DBType;
IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	"imyie.chpurizator",
	array(
		"CIMYIEElementsCHPURizator" => "classes/".$DBType."/el_codes.php",
		"CIMYIESectionsCHPURizator" => "classes/".$DBType."/sec_codes.php",
	)
);
?>