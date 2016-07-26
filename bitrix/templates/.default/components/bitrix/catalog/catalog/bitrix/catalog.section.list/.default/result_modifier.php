<?php



foreach ($arResult["SECTIONS"] as $k => $sections) {

    
    $dbSection = CIBlockSection::GetList(Array(), array("ID" => $sections['ID'], "IBLOCK_ID" => 5), false, Array("UF_MAN", "UF_GIRL", "UF_PAR"));
    if ($arSection = $dbSection->GetNext()) {
        $arResult["SECTIONS"][$k]['UF_MAN'] = $arSection['UF_MAN'];
        $arResult["SECTIONS"][$k]['UF_GIRL'] = $arSection['UF_GIRL'];
        $arResult["SECTIONS"][$k]['UF_PAR'] = $arSection['UF_PAR'];
    }
}






    
    
   
    switch ($_GET['SORT']) {
        case 'UF_GIRL':
            uasort($arResult["SECTIONS"], function($a, $b) {
                if ($a["UF_GIRL"] < $b["UF_GIRL"]) {
                    return -1;
                } else if ($a["UF_GIRL"] == $b["UF_GIRL"]) {
                    return 0;
                } else if ($a["UF_GIRL"] > $b["UF_GIRL"]) {
                    return 1;
                };
            });
            break;

        case 'UF_MAN':
            uasort($arResult["SECTIONS"], function($a, $b) {
                if ($a["UF_MAN"] < $b["UF_MAN"]) {
                    return -1;
                } else if ($a["UF_MAN"] == $b["UF_MAN"]) {
                    return 0;
                } else if ($a["UF_MAN"] > $b["UF_MAN"]) {
                    return 1;
                };
            });
            break;

        case 'UF_PAR':
            uasort($arResult["SECTIONS"], function($a, $b) {
                if ($a["UF_PAR"] < $b["UF_PAR"]) {
                    return -1;
                } else if ($a["UF_PAR"] == $b["UF_PAR"]) {
                    return 0;
                } else if ($a["UF_PAR"] > $b["UF_PAR"]) {
                    return 1;
                };
            });
            break;

        default:

            break;
    }


//    echo "<pre>";
//    var_dump($arResult["SECTIONS"]);
//    die();

    
    
    $cp = $this->__component; // объект компонента
if (is_object($cp)){
    $cp->SetResultCacheKeys(array('TIMESTAMP_X'));
}


?>