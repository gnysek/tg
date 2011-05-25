<?php
$this->breadcrumbs=array(
	'Ranking'=>array('/ranking'),
	'winner',
);?>
<?php 
//	$user = User::model()->findByPk($winner->winner);
//	echo $user->name;
	/* @var $game Game */
	echo '<b>Zwycięża:</b>';
	echo '<h2>' . $game->name . '</h2>';
	echo '<b>Wydana przez:</b>';
	echo '<h2>' . $game->publisher->name . '</h2>';
?>