<?php
use Bitrix\Crm\DealTable;
class classDeal extends CBitrixComponent
{
    
    function Deal() {
    
        $arResult = [];

        $query = DealTable::getList([
            'select' => ['ID', 'TITLE', 'STAGE_ID', 'DATE_CREATE', 'ASSIGNED_BY_ID'],
            'order' => ['DATE_CREATE' => 'DESC'],
            'limit' => 20 // количество сделок
        ]);

        while ($deal = $query->fetch()) {
            $arResult[] = $deal;
        }

        return $arResult;
    }
    public function executeComponent(){
        $this->arResult = array_merge($this->arResult, $this->Deal());
        
        $this->IncludeComponentTemplate();
    }


};
?>



