<?php
$this->breadcrumbs=array(
	'Game Bugtrackers'=>array('index'),
	$model->bug_id=>array('view','id'=>$model->bug_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GameBugtracker', 'url'=>array('index')),
	array('label'=>'Create GameBugtracker', 'url'=>array('create')),
	array('label'=>'View GameBugtracker', 'url'=>array('view', 'id'=>$model->bug_id)),
	array('label'=>'Manage GameBugtracker', 'url'=>array('admin')),
);
?>

<h1>Update GameBugtracker <?php echo $model->bug_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>