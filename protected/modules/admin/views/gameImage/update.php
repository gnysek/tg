<?php
$this->breadcrumbs=array(
	'Game Images'=>array('index'),
	$model->title=>array('view','id'=>$model->game_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GameImage', 'url'=>array('index')),
	array('label'=>'Create GameImage', 'url'=>array('create')),
	array('label'=>'View GameImage', 'url'=>array('view', 'id'=>$model->game_id)),
	array('label'=>'Manage GameImage', 'url'=>array('admin')),
);
?>

<h1>Update GameImage <?php echo $model->game_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>