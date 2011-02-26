<?php
$this->breadcrumbs=array(
	'Game Bugtrackers',
);

$this->menu=array(
	array('label'=>'Create GameBugtracker', 'url'=>array('create')),
	array('label'=>'Manage GameBugtracker', 'url'=>array('admin')),
);
?>

<h1>Game Bugtrackers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
