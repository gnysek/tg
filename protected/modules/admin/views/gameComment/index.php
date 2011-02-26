<?php
$this->breadcrumbs=array(
	'Game Comments',
);

$this->menu=array(
	array('label'=>'Create GameComment', 'url'=>array('create')),
	array('label'=>'Manage GameComment', 'url'=>array('admin')),
);
?>

<h1>Game Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
