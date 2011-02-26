<?php
$this->breadcrumbs=array(
	'Game Votes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GameVote', 'url'=>array('index')),
	array('label'=>'Manage GameVote', 'url'=>array('admin')),
);
?>

<h1>Create GameVote</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>