<?php
$this->breadcrumbs=array(
	'Game Bugtrackers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GameBugtracker', 'url'=>array('index')),
	array('label'=>'Manage GameBugtracker', 'url'=>array('admin')),
);
?>

<h1>Create GameBugtracker</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>