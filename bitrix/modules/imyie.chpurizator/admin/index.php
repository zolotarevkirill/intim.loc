<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
IncludeModuleLangFile(__FILE__);

// This page name
$yaPage = "imyie_chpurizator.php";
define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");

CModule::IncludeModule('imyie.chpurizator');

if($_REQUEST['chpurizator']=="start" && check_bitrix_sessid())
{
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_js.php");
	/* __________________________________________________________________________________________ start AJAX part */
	if($_REQUEST["work_with"]=="el")
	{
		$settings = CIMYIEElementsCHPURizator::CheckSettings( $_REQUEST["START_ID"], $_REQUEST["IBLOCK_ID"], $_REQUEST );
		if($settings)
		{
			$resultat = CIMYIEElementsCHPURizator::UpdateCodes( $settings["START_ID"], $settings["IBLOCK_ID"], $settings );
			echo $resultat;
		} else {
			echo '<script>imyieInsertToResultErrorTable( "<font color=\'#FF0000\'>'.GetMessage("IMYIE_CHPURIZATOR_JS_SETTINGS_FAIL").'</font>" );
CloseWaitWindow();
document.getElementById("btn_start_process").disabled = false;
document.getElementById("btn_stop_process").disabled = true;
</script>';
		}
	} elseif($_REQUEST["work_with"]=="sec")
	{
		$settings = CIMYIESectionsCHPURizator::CheckSettings( $_REQUEST["START_ID"], $_REQUEST["IBLOCK_ID"], $_REQUEST );
		if($settings)
		{
			$resultat = CIMYIESectionsCHPURizator::UpdateCodes( $settings["START_ID"], $settings["IBLOCK_ID"], $settings );
			echo $resultat;
		} else {
			echo '<script>imyieInsertToResultErrorTable( "<font color=\'#FF0000\'>'.GetMessage("IMYIE_CHPURIZATOR_JS_SETTINGS_FAIL").'</font>" );
CloseWaitWindow();
document.getElementById("btn_start_process").disabled = false;
document.getElementById("btn_stop_process").disabled = true;
</script>';
		}
	} else {
		echo '<script>imyieInsertToResultErrorTable( "<font color=\'#FF0000\'>'.GetMessage("IMYIE_CHPURIZATOR_JS_UNDEFINED_ACTION_TYPE").'</font>" );
CloseWaitWindow();
document.getElementById("btn_start_process").disabled = false;
document.getElementById("btn_stop_process").disabled = true;
</script>';
	}
	/* __________________________________________________________________________________________ end AJAX part */
	require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_admin_js.php");
}

// сформируем список закладок
$aTabs = array(
	array(
		"DIV" => "imyie_chpurizator_el",
		"TAB" => GetMessage("IMYIE_CHPURIZATOR_TAB1_NAME"),
		"ICON" => "main_user_edit",
		"TITLE" => GetMessage("IMYIE_CHPURIZATOR_TAB1_DESCRIPTION")
	),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);

// установим заголовок страницы
$APPLICATION->SetTitle( GetMessage("IMYIE_CHPURIZATOR_PAGE_TITLE") );

// не забудем разделить подготовку данных и вывод
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");





// далее выводим собственно форму
?>
<script type="text/javascript">
	var runKey = false;
	var userAbort = false;
	function IMYIE_PreStart()
	{
		runKey = true;
		userAbort = false;
		document.getElementById("imyie_tbl_result_time").innerHTML = "";
		document.getElementById("imyie_tbl_result").innerHTML = "";
		document.getElementById("imyie_tbl_result_error").innerHTML = "";
		IMYIE_Start();
	}
	function IMYIE_Start( START_ID, IBLOCK_ID )
	{
		var URL = "imyie_chpurizator.php?<?=bitrix_sessid_get()?>&";
		var DATA = "";
		if(runKey)
		{
			ShowWaitWindow();
			document.getElementById("btn_start_process").disabled = true;
			document.getElementById("btn_stop_process").disabled = false;
			URL+="chpurizator=start&";
			if(!START_ID)
			{
				imyieInsertToResultTable( '<?=GetMessage("IMYIE_CHPURIZATOR_JS_SCRIPT_STARTED")?><hr />' );
				URL+="START_ID=0&";
			}
			else
				URL+="START_ID=" + START_ID + "&";
			if(!IBLOCK_ID)
				URL+="IBLOCK_ID=" + document.getElementById("IBLOCK_ID").value + "&";
			else
				URL+="IBLOCK_ID=" + IBLOCK_ID + "&";
			URL+="time_limit=" + document.getElementById("time_limit").value + "&";
			URL+="time_delay=" + document.getElementById("time_delay").value + "&";
			URL+="only_empty_code=" + document.getElementById("only_empty_code").value + "&";
			URL+="work_with=" + document.getElementById("work_with").value + "&";
			BX.ajax.post(
				URL,
				DATA,
				function(result){
					document.getElementById("imyie_tbl_result_time").innerHTML = result;
				}
			);
		}
		if(userAbort)
		{
			imyieInsertToResultTable( '<font color=\'#009900\'><?=GetMessage("IMYIE_CHPURIZATOR_JS_ABORT_BY_USER")?></font>' );
			document.getElementById("btn_start_process").disabled = false;
		}
	}
	function IMYIE_Stop()
	{
		imyieInsertToResultTable( '<?=GetMessage("IMYIE_CHPURIZATOR_JS_SCRIPT_INTERRUPT")?><hr />' );
		document.getElementById("btn_stop_process").disabled = true;
		runKey = false;
		userAbort = true;
	}
	function imyieInsertToResultTable( string )
	{
		var tbl = document.getElementById("imyie_tbl_result");
		var newRow = tbl.insertRow(-1);
		var newCell = newRow.insertCell(-1);
		newCell.innerHTML = string;
	}
	function imyieInsertToResultErrorTable( string )
	{
		var tbl = document.getElementById("imyie_tbl_result_error");
		var newRow = tbl.insertRow(-1);
		var newCell = newRow.insertCell(-1);
		newCell.innerHTML = string;
	}
</script>

<?echo BeginNote();
echo '<span class="required">'.GetMessage("IMYIE_CHPURIZATOR_MSG1").' <a href="dump.php?lang='.LANG.'" target="blank">'.GetMessage("IMYIE_CHPURIZATOR_MSG2").'</a></span><br />'.GetMessage("IMYIE_CHPURIZATOR_MSG3");
echo EndNote();?>

<form id="imyie_chpurizator" method="POST" action="<?=$APPLICATION->GetCurPage()?>" ENCTYPE="multipart/form-data" name="imyie_chpurizator">
<?
// проверка идентификатора сессии
echo bitrix_sessid_post();

// отобразим заголовки закладок
$tabControl->Begin();





//___________________________________________________________________________________________
// первая закладка - 
//___________________________________________________________________________________________
$tabControl->BeginNextTab();

?>
	<tr>
		<td width="40%" valign="top"><span class="required">*</span> <?=GetMessage("IMYIE_CHPURIZATOR_CHOSE_IBLOCK")?>:</td>
		<td width="60%"><?=GetIBlockDropDownList($IBLOCK_ID, "IBLOCK_TYPE_ID", "IBLOCK_ID");?></td>
	</tr>
	<tr>
		<td width="40%" valign="top"><span class="required">*</span> <?=GetMessage("IMYIE_CHPURIZATOR_WORK_WITH")?>:</td>
		<td width="60%">
			<select id="work_with" name="work_with">
				<option value=""><?=GetMessage("IMYIE_CHPURIZATOR_WORK_WITH_EMPTY")?></option>
				<option value="el"><?=GetMessage("IMYIE_CHPURIZATOR_WORK_WITH_EL")?></option>
				<option value="sec"><?=GetMessage("IMYIE_CHPURIZATOR_WORK_WITH_SEC")?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td width="40%" valign="top"><span class="required">*</span> <?=GetMessage("IMYIE_CHPURIZATOR_TIME_LIMIT")?>:</td>
		<td width="60%"><input type="text" id="time_limit" name="el_time_limit" value="20" /> <?=GetMessage("IMYIE_CHPURIZATOR_TIME_SEC")?></td>
	</tr>
	<tr>
		<td width="40%" valign="top"><span class="required">*</span> <?=GetMessage("IMYIE_CHPURIZATOR_TIME_DELAY")?>:</td>
		<td width="60%"><input type="text" id="time_delay" name="el_time_delay" value="3" /> <?=GetMessage("IMYIE_CHPURIZATOR_TIME_SEC")?></td>
	</tr>
	<tr>
		<td width="40%" valign="top"><?=GetMessage("IMYIE_CHPURIZATOR_ONLY_EMPTY_CODE")?>:</td>
		<td width="60%"><input type="checkbox" id="only_empty_code" name="el_only_empty_code" value="Y" checked /></td>
	</tr>
	<tr class="heading">
		<td colspan="2"><?=GetMessage("IMYIE_CHPURIZATOR_RESULTAT")?></td>
	</tr>
	<tr>
		<td colspan="2">
			<table id="imyie_tbl_result" style="width:100%;"></table>
			<div id="imyie_tbl_result_time"></div>
		</td>
	</tr>
	<tr class="heading">
		<td colspan="2"><?=GetMessage("IMYIE_CHPURIZATOR_RESULTAT_ERROR")?></td>
	</tr>
	<tr>
		<td colspan="2">
			<table id="imyie_tbl_result_error" style="width:100%;"></table>
		</td>
	</tr>
<input type="hidden" name="lang" value="<?=LANG?>">
<?




/* buttons */
$tabControl->Buttons();?>
	<input type="button" name="start" value="<?=GetMessage("IMYIE_CHPURIZATOR_BTN_START")?>" id="btn_start_process" onclick="IMYIE_PreStart();return false;" />
	<input type="button" name="start" value="<?=GetMessage("IMYIE_CHPURIZATOR_BTN_STOP")?>" id="btn_stop_process" onclick="IMYIE_Stop();return false;" disabled />
<?





// завершаем интерфейс закладок
$tabControl->End();






// информационная подсказка
echo BeginNote();?>
<span class="required">*</span><?=GetMessage("REQUIRED_FIELDS")?><br />
<?echo EndNote();


// Include footer
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>