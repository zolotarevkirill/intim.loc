<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/imyie.chpurizator/classes/general/main.php");
IncludeModuleLangFile(__FILE__);

class CIMYIESectionsCHPURizator extends CIMYIECHPURizator
{
	function CheckSettings( $StartID, $IBLOCK_ID, $arSettings )
	{
		$arDefaultSetings = array(
			"time_limit" => 20,
			"time_delay" => 3,
			"only_empty_code" => "Y",
		);
		foreach($arDefaultSetings as $key => $value)
		{
			if (array_key_exists($key, $arSettings))
				$arDefaultSetings[$key] = $arSettings[$key];
		}
		$StartID = intval($StartID);
		$IBLOCK_ID = intval($IBLOCK_ID);
		if($IBLOCK_ID<1)
			return false;
		$arDefaultSetings["START_ID"] = $StartID;
		$arDefaultSetings["IBLOCK_ID"] = $IBLOCK_ID;
		return $arDefaultSetings;
	}

	function UpdateCodes( $StartID, $IBLOCK_ID, $arSettings )
	{
		global $DB, $APPLICATION;
		$chetchik = 0;
		$the_end = "N";
		$time_start = time();
		$arBadID = array();
		$query_count = "select count(ID) from b_iblock_section WHERE IBLOCK_ID = '".$IBLOCK_ID."' and ID >= '0'";
		if($arSettings["only_empty_code"]=="Y")
			$query_count.= " and (CODE = '' OR CODE IS NULL)";
		$results_count = $DB->Query( $query_count );
		if($cnt_count = $results_count->Fetch())
		{
			$full_count_el = $cnt_count["count(ID)"];
		}
		$query = "SELECT `ID`, `NAME`, `CODE`
					FROM b_iblock_section
					WHERE IBLOCK_ID = '".$IBLOCK_ID."' and ID >= '".$StartID."'";
		if($arSettings["only_empty_code"]=="Y")
			$query.= " and (CODE = '' OR CODE IS NULL)";
		$query.= " ORDER BY `ID` ASC";
		addMessage2Log( $query );
		$results = $DB->Query( $query );
		while($row = $results->Fetch())
		{
			addMessage2Log( print_r($row,true) );
			$LastID = $row["ID"];
			$NEW_CODE = CIMYIESectionsCHPURizator::_GenerateCode( $LastID, $row["NAME"] );
			$result_upd = CIMYIESectionsCHPURizator::_UpdateCodeByID( $LastID, $NEW_CODE );
			if(!$result_upd)
				$arBadID[] = $LastID;
			$time_now = time();
			if(($time_now-$time_start)>$arSettings["time_limit"])
			{
				$the_end = "N";
				break;
			} else {
				$the_end = "Y";
			}
			$chetchik++;
		}
		
		$result_html = CIMYIESectionsCHPURizator::_ReturneJS( $LastID, $IBLOCK_ID, $arSettings, $full_count_el, $chetchik, $the_end, $time_start, $arBadID );
		return $result_html;
	}

	function _UpdateCodeByID( $ID, $CODE )
	{
		global $DB, $APPLICATION;
		$query_checking = "SELECT count(ID) FROM b_iblock_section
						WHERE `CODE` = '".$CODE."'
						LIMIT 1";
		$results_update = $DB->Query( $query_checking );
		if($cnt_update = $results_update->Fetch())
		{
			$can_update = $cnt_update["count(ID)"];
			if($can_update>0)
				return false;
		}
		$query_update = "UPDATE b_iblock_section
						SET `CODE` = '".$CODE."'
						WHERE `ID` = '".$ID."'
						LIMIT 1";
		$results_update = $DB->Query( $query_update );
		return true;
	}

	function _GenerateCode( $ID, $NAME )
	{
		global $DB, $APPLICATION;
		$translit_name = CUtil::translit($NAME, LANGUAGE_ID);
		$query_check = "SELECT `ID`, `NAME`, `CODE`
					FROM b_iblock_section
					WHERE CODE LIKE '".$translit_name."'
					ORDER BY `ID` ASC";
		$results_check = $DB->Query( $query_check );
		if($row_check = $results_check->Fetch())
		{
			return $translit_name."-".$ID;
		} else {
			return $translit_name;
		}
	}
	
	function _ReturneJSBadID( $arBadID )
	{
		$return = '';
		if(is_array($arBadID) && $arBadID[0]>0)
		{
			$return.= 'imyieInsertToResultErrorTable( "<font color=\'#FF0000\'>'.GetMessage("IMYIE_CHPURIZATOR_ERROR_NOT_CHANGED").'</font>';
			foreach($arBadID as $key => $badID)
			{
				$return.= $badID;
				if(($key+1)<count($arBadID))
					$return.= ', ';
			}
			$return.= '" );';
		} else {
			$return = '';
		}
		return $return;
	}

	function _ReturneJS( $LastID, $IBLOCK_ID, $arSettings, $full_count_el, $chetchik, $the_end, $time_start, $arBadID )
	{
		global $DB, $APPLICATION;
		$time_start = intval($time_start);
		$query_covered = "select count(ID) from b_iblock_section WHERE IBLOCK_ID = '".$IBLOCK_ID."' and ID <= '".$LastID."'";
		$results_covered = $DB->Query( $query_covered );
		if($res_covered = $results_covered->Fetch())
		{
			$covered_count_el = $res_covered["count(ID)"];
		}
		
		$query_balance = "select count(ID) from b_iblock_section WHERE IBLOCK_ID = '".$IBLOCK_ID."' and ID > '".$LastID."'";
		if($arSettings["only_empty_code"]=="Y")
			$query_balance.= " and (CODE = '' OR CODE IS NULL)";
		$results_balance = $DB->Query( $query_balance );
		if($res_balance = $results_balance->Fetch())
		{
			$balance_count_el = $res_balance["count(ID)"];
		}
		
		if($the_end=="N")
		{
			$return = '<script>
CloseWaitWindow();
imyieInsertToResultTable( "'.GetMessage("IMYIE_CHPURIZATOR_EL_LAST_FIXED_ID").'<b>'.$LastID.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_CONFIMED_ON_THIS_STEP").'<b>'.$chetchik.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_FULL_CONFIMED").'<b>'.$covered_count_el.GetMessage("IMYIE_CHPURIZATOR_EL_FULL_CONFIMED_FROM").$full_count_el.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_LEFT_ELEMENTS").'<b>'.$balance_count_el.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_T_DELAY").'<b>'.$arSettings["time_delay"].' '.GetMessage("IMYIE_CHPURIZATOR_EL_T_DELAY_SEC").'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_WAITING_NEXT_STEP").'<hr />" );';
$return.= CIMYIESectionsCHPURizator::_ReturneJSBadID( $arBadID );
	$return.= 'setTimeout(function(){
	IMYIE_Start( '.$LastID.', '.$IBLOCK_ID.' );
}, '.($arSettings["time_delay"]).'000);
</script>';
		} else {
			$return = '<script>
CloseWaitWindow();
imyieInsertToResultTable( "'.GetMessage("IMYIE_CHPURIZATOR_EL_LAST_FIXED_ID").'<b>'.$LastID.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_CONFIMED_ON_THIS_STEP").'<b>'.$chetchik.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_FULL_CONFIMED").'<b>'.$covered_count_el.GetMessage("IMYIE_CHPURIZATOR_EL_FULL_CONFIMED_FROM").$full_count_el.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_LEFT_ELEMENTS").'<b>'.$balance_count_el.'</b><br />'.GetMessage("IMYIE_CHPURIZATOR_EL_T_DELAY").'<b>'.$arSettings["time_delay"].' '.GetMessage("IMYIE_CHPURIZATOR_EL_T_DELAY_SEC").'</b><br /><font color=\'#009900\'>'.GetMessage("IMYIE_CHPURIZATOR_EL_SCRIPT_HAS_FINISHED").'<font>" );';
$return.= CIMYIESectionsCHPURizator::_ReturneJSBadID( $arBadID );
	$return.= 'document.getElementById("btn_start_process").disabled = false;
document.getElementById("btn_stop_process").disabled = true;';
	$return.= '</script>';
		}
		return $return;
	}
}
?>
