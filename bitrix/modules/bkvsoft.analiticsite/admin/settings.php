<?
// подключим все необходимые файлы:
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php"); // первый общий пролог
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/bkvsoft.analiticsite/function.inc.php"); // Тут держим все фунции для работы модуля
// Константы!
$url_site = $_SERVER['SERVER_NAME'];

// подключим языковой файл
IncludeModuleLangFile(__FILE__);
?>

    

<?


/* Закладки */
$aTabs = array(
	array(
		"DIV" => "settings", 
	
	)
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
CJSCore::Init(array('ajax'));
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
$APPLICATION->SetTitle(GetMessage("NAME"));
?> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.knob/1.2.11/jquery.knob.min.js"></script>
<script>
 $(function() {
                $(".knob").knob();
            });

</script>

<style>
.zagals{text-transform: uppercase;
        text-align: center;}
.tic , .pr {text-transform: uppercase; 
            text-align: center; 
            font-size: 25px;
            padding-top: 20px; 
            padding-bottom: 20px; color: #555555;}
.tic{ background: #FA6800;}
.pr { background: #1BA1E2;}

.gdetop, .gmobile {text-align: center; font-size: 16px; padding-top: 10px; padding-bottom: 20px; font-style: italic;} 
</style>


	<?
	// отобразим заголовки закладок
	$tabControl->Begin();

	$tabControl->BeginNextTab();
	?>
	<tr style="margin-bottom: 10px;">
		<th><?GetMessage("TITLE_SELECT")?></th>
	</tr>
	<tr>
		<td>
        <div class="container-fluid">
 <div class="row">
  <div class="col-md-12"><h3 class="zagals"><?=GetMessage("BKVSOFT_ANALITICSITE_PROVERKA_TIC_I_SA")?></h3></div>
  <div class="col-md-4 tic img-thumbnail"><?=GetMessage("BKVSOFT_ANALITICSITE_TIC")?><?echo ya_tic($url_site);?> </div>
  <div class="col-md-4"></div>
  <div class="col-md-4 pr img-thumbnail">PR  <?echo getpagerank($url_site);?> </div>
</div>


 <div class="row">
  <div class="col-md-12"><h3 class="zagals">google PageSpeed Insights</h3></div>
  <div class="col-md-4 gdetop img-thumbnail"><?=GetMessage("BKVSOFT_ANALITICSITE_DLA_KOMPQUTEROV")?><br /><br />
  <input class="knob" data-skin="tron" data-fgColor="#FF8000" data-thickness=".4" data-readOnly=true value="<?echo googleSTdesktop($url_site)?>"  >
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4 gmobile img-thumbnail"><?=GetMessage("BKVSOFT_ANALITICSITE_DLA_TELEFONOV")?><br /><br />
  <input class="knob" data-skin="tron" data-fgColor="#FF8000" data-thickness=".4" data-readOnly=true value="<?echo googleSTmobile($url_site)?>"  >
  </div>
</div>


 <div class="row">
  <div class="col-md-12"><h3 class="zagals"><?=GetMessage("BKVSOFT_ANALITICSITE_NAHOJDENIA_SAYTA_V_K")?></h3></div>
  <div class="col-md-4 gdetop img-thumbnail"> <?=GetMessage("BKVSOFT_ANALITICSITE_NALICIE_V_A")?><strong> <?if(ya_cat($url_site) >= 1) { echo GetMessage("BKVSOFT_ANALITICSITE_ESTQ"); }else {echo GetMessage("BKVSOFT_ANALITICSITE_NETU");}?></strong>
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4 gmobile img-thumbnail"><?=GetMessage("BKVSOFT_ANALITICSITE_NALICIE_V")?><strong> <?if(get_dmoz_count($url_site) >= 1) { echo GetMessage("BKVSOFT_ANALITICSITE_ESTQ"); }else {echo GetMessage("BKVSOFT_ANALITICSITE_NETU");}?></strong>
  </div>
</div>

</div>
       
        

        


		</td>
	</tr>
	<?
	// завершение формы - вывод кнопок сохранения изменений
	$tabControl->Buttons(
	  array(
	    // "disabled" => ($POST_RIGHT<"W"),
	    "back_url" => $_SERVER['PHP_SELF']."?lang=".LANG,
	  )
	);

	// завершаем интерфейс закладки
	$tabControl->End();
	?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php"); ?>