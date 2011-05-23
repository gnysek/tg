<?php
$this->breadcrumbs=array(
	'Rankings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Wszystkie rankingi', 'url'=>array('index'))
);
?>

<h1>Stwórz swój własny ranking</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'game'=>$game)); ?>