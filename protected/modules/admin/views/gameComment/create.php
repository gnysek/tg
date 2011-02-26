<?php
$this->breadcrumbs=array(
	'Game Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GameComment', 'url'=>array('index')),
	array('label'=>'Manage GameComment', 'url'=>array('admin')),
);
?>

<h1>Create GameComment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>