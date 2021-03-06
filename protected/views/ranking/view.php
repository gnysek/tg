<?php
$this->breadcrumbs=array(
	'Ranking'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Wszystkie rankingi', 'url'=>array('index'))
	);
	
	if(!empty(Yii::app()->user->id)){
	array_push($this->menu, array('label'=>'Stwórz ranking', 'url'=>array('create')));
		if(empty($model->winner)){
			array_push($this->menu, array('label'=>'Dodaj swoją grę do rankingu', 'url'=>array('addGame', 'user'=> YII::app()->user->id,'ranking'=>$model->ranking_id)));
		}
	}
	if(YII::app()->user->id == $model->ranking_creator && empty($model->winner)){
			array_push($this->menu, array('label'=>'Edytuj ranking', 'url'=>array('update', 'id'=>$model->ranking_id)));
			array_push($this->menu, array('label'=>'Usuń ranking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ranking_id),'confirm'=>'Czy napewno chcesz usunąć?')));			
			array_push($this->menu, array('label'=>'Zakończ ranking - Zwycięsca', 'url'=>array('winner', 'ranking'=>$model->ranking_id)));
	}

?>


<h1><?php echo $model->name; ?></h1>
<b>Twórca rankingu: <?php echo $creator->name;?></b>
<p><b>Zasady: <?php echo $model->rules;?></b></p>
<p>Data rozpoczęcia rankingu: <?php echo date('d-m-Y', $model->start_date);?></p>
<p>Data zakończenia rankingu: <?php echo date('d-m-Y', $model->end_date);?></p>
<?php if(empty($model->winner)){?>
Gry biorące udział w rankingu:<br/>

<?php echo $this->renderPartial('gameView', array('game'=>$game, 'model'=>$model, 'pages' => $pages)); ?>

<?php } else {
	echo '<b>Zwycięża:</b>';
	echo '<h2>' . $game_winner->name . '</h2>';
	echo '<b>Wydana przez:</b>';
	echo '<h2>' . $game_winner->publisher->name . '</h2>';
	
}?>
