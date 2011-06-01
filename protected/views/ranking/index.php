<?php
$this->breadcrumbs=array(
	'Ranking' => array('/ranking')
);
if(!empty(Yii::app()->user->id)){
	$this->menu=array(
		array('label'=>'Stwórz ranking', 'url'=>array('create'))
	);
}
?>

<h1>Rankingi</h1>

<table class="tg-table">
	<?php /* @var $ranking Ranking */ $i = 0; ?>
	<?php foreach ($model as $ranking) { ?>
	<tr>
		<td style="width: 5%; text-align: right; vertical-align: top;">
			<h2><?php echo ++$i; ?>.</h2>
		</td>
		<td>
			<?php
				echo "<h2>" . CHtml::link($ranking->name, array('ranking/view', 'id' => $ranking->ranking_id)) . "</h2>";
				
				/* @var $first RankingGame */
				$first = RankingGame::model()->find(array(
					'select' => '*',
					'condition' => 'ranking_id=:rankingId',
					'params' => array(":rankingId" => $ranking->ranking_id),
					'order' => 'score desc'
				));
				
				if(!empty($first)) {
					$first = $first->with('game');
					echo "1. " . CHtml::link($first->game->name, array('game/view', 'id' => $first->game->game_id)) . " <strong>({$first->score})</strong><br/>";
				}
			?>
		</td>
	</tr>
	<?php } ?>
</table>
<div>
	<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
</div>
