<?php
$this->breadcrumbs=array(
	'Rankings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ranking', 'url'=>array('index')),
	array('label'=>'Manage Ranking', 'url'=>array('admin')),
);
?>

<h1>Create Ranking</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>