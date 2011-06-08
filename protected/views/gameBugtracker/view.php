<?php
$this->breadcrumbs=array(
	'Bugtracker'=>array('index'),
	$model->name,
);

$this->menu = array(
		array('label' => "Dodaj buga", 'url' => array('/gameBugtracker/create', 'gameId' => $model->game_id)),
		array('label' => "Wróc", 'url' => array('/game/view', 'id' => $model->game_id)),
	);

if (count($bug)): ?>
<h2>Bugi:</h2>
<table class="tg-table">
<tr>
<th>Status</th><th>Typ</th><th>Opis</th><th>Odpowiedz</th>
</tr>
<?php
$i = 0;
foreach ($bug as $bag) {
	echo $this->renderPartial('_view', array('model' => $bag, 'id' => ++$i ));
}
?>
<?php else: ?>
<h2>Brak zgłoszonych bugów ;)</h2>
<?php endif; ?>

</table>