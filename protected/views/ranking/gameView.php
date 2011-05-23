
<table class="tg-table">

<?php /* @var $gra Game */ $i = 0; ?>
	<?php
	
	 foreach ($game as $gra): ?>
	<tr><td><h2>
	<?php $name = Game::model()->find(array(
			'select' => '*',
			'condition' => 'game_id=:gameID',
			'params' => array(':gameID' => $gra->game_id )
		)); 
		echo $name->name."<br/></td><td>";
		$entry = RankingGame::model()->findAllByAttributes(array('game_id'=>$gra->game_id, 'ranking_id'=>$model->ranking_id));
		 foreach ($entry as $en): 
			
		endforeach;
			if (!Yii::app()->user->isGuest && RankingController::userVote($model->ranking_id)) {
				$this->widget('CStarRating', array(
					'name' => 'RankingVote'.$gra->game_id,
					'minRating' => 1, //minimal value
					'maxRating' => 10, //max value
					'starCount' => 10, //number of stars
					'callback'=>'
						function(){
							$.ajax({
								type: "POST",
								url: "' . Yii::app()->createUrl('ranking/vote') . '",
								data: { game: ' . $gra->game_id . ', vote: $(this).val(), entry_id:'.$en->entry_id .',ranking_id:'.$model->ranking_id.'},
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
			echo "<br/><p id=\"score\">Wynik: <strong>{$gra->score}</strong></p>";
		
	?>
	</h2></td></tr>
	<?php endforeach; ?>

</table>	
