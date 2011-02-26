<?php
$this->breadcrumbs=array(
	'Game Videos'=>array('index'),
	$model->title=>array('view','id'=>$model->game_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GameVideo', 'url'=>array('index')),
	array('label'=>'Create GameVideo', 'url'=>array('create')),
	array('label'=>'View GameVideo', 'url'=>array('view', 'id'=>$model->game_id)),
	array('label'=>'Manage GameVideo', 'url'=>array('admin')),
);
?>

<h1>Update GameVideo <?php echo $model->game_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>