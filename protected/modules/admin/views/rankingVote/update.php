<?php
$this->breadcrumbs=array(
	'Ranking Votes'=>array('index'),
	$model->entry_id=>array('view','id'=>$model->entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RankingVote', 'url'=>array('index')),
	array('label'=>'Create RankingVote', 'url'=>array('create')),
	array('label'=>'View RankingVote', 'url'=>array('view', 'id'=>$model->entry_id)),
	array('label'=>'Manage RankingVote', 'url'=>array('admin')),
);
?>

<h1>Update RankingVote <?php echo $model->entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>