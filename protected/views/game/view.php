<script type="text/javascript">
	var host_url = 'http://localhost/tg/';
	$().ready(function(){
		$('a[rel*=facebox]').facebox();
	});
</script>
<?php
/* @var $model Game */
$this->breadcrumbs = array(
	'Game' => array('/game'),
	$model->name,
);

if ($model->publisher->isPublisherAdmin()){
	$this->menu = array(
		array('label' => "Dodaj screen'a", 'url' => array('/gameImage/create', 'gameId' => $model->game_id)),
		array('label' => "Dodaj video", 'url' => array('/gameVideo/create', 'gameId' => $model->game_id)),
		array('label' => "Edytuj grę", 'url' => array('/game/update', 'id' => $model->game_id, 'pub' => $model->publisher->name))
	);

	if ($model->bugtracker_enabled == 1)
		array_push($this->menu, array('label' => "Zobacz swoje bugi", 'url' => array('/gameBugtracker/view', 'id' => $model->game_id)));
} else {
	if ($model->bugtracker_enabled == 1){
			array_push($this->menu, array('label' => "Dodaj buga", 'url' => array('/gameBugtracker/create', 'gameId' => $model->game_id)));
			array_push($this->menu, array('label' => "Zobacz bugi gry", 'url' => array('/gameBugtracker/view', 'id' => $model->game_id)));
	}
	array_push($this->menu, array('label' => "Dodaj do ulubionych", 'url' => array('/gameFavs/add', 'gameId' => $model->game_id)));
	
}
?>
<h1><?php echo $model->name ?></h1>

<div style="float: right;">
	<?php
		if($model->voteEnable()) {
			if (!Yii::app()->user->isGuest && GameController::userVote($model->game_id)) {
				$this->widget('CStarRating', array(
					'name' => 'GameVote',
					'minRating' => 1, //minimal value
					'maxRating' => 10, //max value
					'starCount' => 10, //number of stars
					'callback'=>'
						function(){
							$.ajax({
								type: "POST",
								url: "' . Yii::app()->createUrl('game/vote') . '",
								data: { game: ' . $model->game_id . ', vote: $(this).val() },
								async: false,
								cache: false,
								success: function(msg){
									 $("#GameVote").remove();
							         $("#score").html(msg);
								}
							})
						}'
					));
			}
			echo "<p id=\"score\">Wynik: <strong>{$model->score}</strong></p>";
		}
	?>
</div>

<a href="<?php echo $model->url ?>" target="_blank"><b>Pobierz</b></a><br/>
<br/>
	Wydana przez: <b><?php echo $model->publisher->name ?></b><br/>
	Rozmiar: <b><?php echo $model->size ?> MB</b><br/>
<div id="screens">
	<?php if (count($model->gameImage) > 0): ?>
	<?php echo $this->renderPartial('view_images',array('model' => $model)) ?>
	<?php endif; ?>
</div>
<div id="videos">
	<?php if (count($model->gameVideo) > 0): ?>
	<?php echo $this->renderPartial('view_videos', array('model' => $model)) ?>
	<?php endif; ?>
</div>