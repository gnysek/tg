<?php
$this->breadcrumbs=array(
	'Content Votes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContentVote', 'url'=>array('index')),
	array('label'=>'Manage ContentVote', 'url'=>array('admin')),
);
?>

<h1>Create ContentVote</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>