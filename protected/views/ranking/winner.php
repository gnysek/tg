<?php
$this->breadcrumbs=array(
	'Ranking'=>array('/ranking'),
	'winner',
);?>
<?php 
	$user = User::model()->findByPk($winner->winner);
	echo $user->name;
?>