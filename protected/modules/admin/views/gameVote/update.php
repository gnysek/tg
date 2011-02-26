<?php
$this->breadcrumbs=array(
	'Game Votes'=>array('index'),
	$model->game_id=>array('view','id'=>$model->game_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GameVote', 'url'=>array('index')),
	array('label'=>'Create GameVote', 'url'=>array('create')),
	array('label'=>'View GameVote', 'url'=>array('view', 'id'=>$model->game_id)),
	array('label'=>'Manage GameVote', 'url'=>array('admin')),
);
?>

<h1>Update GameVote <?php echo $model->game_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>