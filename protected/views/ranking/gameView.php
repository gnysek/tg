<table class="tg-table">
<?php /* @var $gra Game */ $i = 0; ?>
	<?php foreach ($game as $gra) { ?>
	<tr>
		<td>
			<h2>
				<?php
					$name = Game::model()->find(array(
						'select' => 'name',
						'condition' => 'game_id=:gameID',
						'params' => array(':gameID' => $gra->game_id )
					));
					
					echo $name->name;
				?>
			</h2>
		</td>
		<td>
			<?php
				$entry = RankingGame::model()->findAllByAttributes(array(
					'game_id' => $gra->game_id,
					'ranking_id' => $model->ranking_id
				));
				
				foreach ($entry as $en) {
					if (!Yii::app()->user->isGuest && RankingController::userVote($en->entry_id)) {
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
										data: {
											game: ' . $gra->game_id . ',
											vote: $(this).val(),
											entry_id:'.$en->entry_id .',
											ranking_id:'.$model->ranking_id.'
										},
										cache: false,
										success: function(msg){
											$("#RankingVote' . $gra->game_id . '").remove();
											$("#score' . $gra->game_id . '").html(msg);
										}
									})
							}'
						));
						echo "<br/>";
					}
			?>
			<p id="score<?php echo $gra->game_id; ?>">Wynik <strong><?php echo $gra->score; ?></strong></p>
			<?php } ?>
		</td>
	</tr>
	<?php } ?>
</table>