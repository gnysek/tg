<?php
$this->breadcrumbs=array(
	'Game Videos',
);

$this->menu=array(
	array('label'=>'Create GameVideo', 'url'=>array('create')),
	array('label'=>'Manage GameVideo', 'url'=>array('admin')),
);
?>

<h1>Game Videos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
