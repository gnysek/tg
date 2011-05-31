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

<?php /* @var $ranking Ranking */ $i = 0; ?>
<?php foreach ($model as $ranking): ?>
	<h2><?php echo ++$i; ?>.
	<?php echo CHtml::link($ranking->name, array('ranking/view', 'id' => $ranking->ranking_id)); ?></h2>
<?php endforeach; ?>

