<?php
$this->breadcrumbs=array(
	'Game Bugtrackers Create',
);

$this->menu=array(
	array('label' => 'Wróc', 'url' => array('game/view', 'id' => $_GET["gameId"]))
);
?>

<h1>Dodaj buga</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>