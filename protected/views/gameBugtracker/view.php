<?php
$this->breadcrumbs=array(
	'Game Bugtrackers'=>array('index'),
	$model->bug_id,
);

if (count($bug)): ?>
<h2>Bugi:</h2>
<table>
<tr>
<th>Status</th><th>Typ</th><th>Opis</th><th>Odpowiedz</th>
</tr>
<?php
$i = 0;
foreach ($bug as $bag) {
	echo $this->renderPartial('_view', array('model' => $bag, 'id' => ++$i ));
}
?>
<?php endif; ?>

</table>