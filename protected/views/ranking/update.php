<?php
$this->breadcrumbs=array(
	'Rankings'=>array('index'),
	$model->name=>array('view','id'=>$model->ranking_id),
	'Update',
);
?>
<?php
$this->menu=array(
	array('label'=>'Wszystkie rankingi', 'url'=>array('index')),
	array('label'=>'Stwórz ranking', 'url'=>array('create'))
	);
	if(YII::app()->user->id == $model->ranking_creator){
			array_push($this->menu, array('label'=>'Usuń ranking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ranking_id),'confirm'=>'Czy napewno chcesz usunąć?')));
	}

?>

<h1>Update Ranking <?php echo $model->ranking_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'game'=>$game)); ?>