<?php
$this->breadcrumbs=array(
	'Forums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Forum', 'url'=>array('index')),
	array('label'=>'Manage Forum', 'url'=>array('admin')),
);
?>

<h1>Create Forum</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>