<?php
$this->breadcrumbs=array(
	'Ranking Votes',
);

$this->menu=array(
	array('label'=>'Create RankingVote', 'url'=>array('create')),
	array('label'=>'Manage RankingVote', 'url'=>array('admin')),
);
?>

<h1>Ranking Votes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
