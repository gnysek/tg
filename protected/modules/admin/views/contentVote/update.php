<?php
$this->breadcrumbs=array(
	'Content Votes'=>array('index'),
	$model->content_id=>array('view','id'=>$model->content_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentVote', 'url'=>array('index')),
	array('label'=>'Create ContentVote', 'url'=>array('create')),
	array('label'=>'View ContentVote', 'url'=>array('view', 'id'=>$model->content_id)),
	array('label'=>'Manage ContentVote', 'url'=>array('admin')),
);
?>

<h1>Update ContentVote <?php echo $model->content_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>