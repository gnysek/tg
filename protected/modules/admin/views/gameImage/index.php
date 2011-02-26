<?php
$this->breadcrumbs=array(
	'Game Images',
);

$this->menu=array(
	array('label'=>'Create GameImage', 'url'=>array('create')),
	array('label'=>'Manage GameImage', 'url'=>array('admin')),
);
?>

<h1>Game Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
