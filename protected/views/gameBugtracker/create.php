<?php
$this->breadcrumbs=array(
	'Game Bugtrackers'=>array('index'),
	'Create',
);

$this->menu=array(
);
?>

<h1>Dodaj buga</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>