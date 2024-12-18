<?php
Bitrix\Main\UI\Extension::load("ui.vue");
define('VUEJS_DEBUG', true);

$arrDeals = $arResult;

foreach ($arrDeals as &$deal) {
  $dateCreate = new DateTime($deal['DATE_CREATE']);
  $deal['DATE_CREATE'] = $dateCreate->format('d.m.Y H:i:s');
}
unset($deal); 

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> 

<div id="app"> 
    <template v-if="deals.length"> 
        <table class="table table-striped"> 
            <thead> 
                <tr> 
                    <th>ID</th> 
                    <th>Название</th> 
                    <th>Статус</th> 
                    <th>Дата создания</th> 
                    <th>Ответственный</th> 
                </tr> 
            </thead> 
            <tbody> 
                <tr v-for="deal in deals" :key="deal.ID"> 
                    <td>{{ deal.ID }}</td> 
                    <td>{{ deal.TITLE }}</td> 
                    <td>{{ deal.STAGE_ID }}</td> 
                    <td>{{ deal.DATE_CREATE }}</td> 
                    <td>{{ deal.ASSIGNED_BY_ID }}</td> 
                </tr> 
            </tbody> 
        </table> 
    </template> 
    <template v-else> 
        <p>Сделок не найдено.</p> 
    </template> 
</div> 

<script type="text/javascript"> 
    BX.Vue.create({ 
        el: '#app', 
        data: { 
            deals: <?= json_encode($arrDeals) ?>
        } 
    }); 
</script>
