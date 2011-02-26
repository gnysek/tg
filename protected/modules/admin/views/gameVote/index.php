<?php
$this->breadcrumbs=array(
	'Game Votes',
);

$this->menu=array(
	array('label'=>'Create GameVote', 'url'=>array('create')),
	array('label'=>'Manage GameVote', 'url'=>array('admin')),
);
?>

<h1>Game Votes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
