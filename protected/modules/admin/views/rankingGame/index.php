<?php
$this->breadcrumbs=array(
	'Ranking Games',
);

$this->menu=array(
	array('label'=>'Create RankingGame', 'url'=>array('create')),
	array('label'=>'Manage RankingGame', 'url'=>array('admin')),
);
?>

<h1>Ranking Games</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
