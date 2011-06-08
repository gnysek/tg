<?php
$this->menu = array(
	array('label' => 'Dodaj swoją grę', 'url' => array('add')),
	array('label' => 'Twoje ulubione gry', 'url' => array('/gameFavs/view', 'id' => Yii::app()->user->id)),
);
$this->breadcrumbs = array(
	'Wszystkie gry',
);
?>

<div class="prebar">
	<div class="bar">
		<div><b>Wszystkie gry</b></div>
	</div>
</div>	

<?php /* @var $gra Game */ $i = 0; ?>
<?php foreach ($model as $gra): ?>
	<h2><?php echo ++$i; ?>.
	<?php echo CHtml::link($gra->name, array('game/view', 'id' => $gra->game_id)); ?></h2>
<?php endforeach; ?>
<div>
	<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
</div>
