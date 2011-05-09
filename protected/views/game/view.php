<?php
/* @var $model Game */
$this->breadcrumbs = array(
	'Game' => array('/game'),
	$model->name,
);
//print_r($model);
$this->menu = array();

if ($model->publisher->isPublisherAdmin())
{
	if ($model->gameImage == null)
		array_push($this->menu, array('label' => "Dodaj screen'a", 'url' => array('/gameImage/create', 'gameId' => $model->game_id)));
	else
	{
		array_push($this->menu, array('label' => "Edytuj screen'a", 'url' => array('/gameImage/update', 'gameId' => $model->game_id)));
		array_push($this->menu, array('label' => "Usuń screen'a", 'url' => '#', 'linkOptions' => array('submit' => array('/gameImage/delete', 'gameId' => $model->game_id), 'confirm' => 'Czy napewno chcesz to zrobić ?')));
	}

	if ($model->gameVideo == null)
		array_push($this->menu, array('label' => "Dodaj video", 'url' => array('/gameVideo/create', 'gameId' => $model->game_id)));
	else
	{
		array_push($this->menu, array('label' => "Edytuj video", 'url' => array('/gameVideo/update', 'gameId' => $model->game_id)));
		array_push($this->menu, array('label' => "Usuń video", 'url' => '#', 'linkOptions' => array('submit' => array('/gameVideo/delete', 'gameId' => $model->game_id), 'confirm' => 'Czy napewno chcesz to zrobić ?')));
	}
		array_push($this->menu, array('label' => "Edytuj grę", 'url' => array('/game/update', 'id' => $model->game_id , 'pub' => $model->publisher->name)));
		
		if ($model->bugtracker_enabled == 1){
			array_push($this->menu, array('label' => "Zobacz swoje bugi", 'url' => array('/gameBugtracker/view', 'id' => $model->game_id)));
		}
		
} else {
	if ($model->bugtracker_enabled == 1){
		array_push($this->menu, array('label' => "Add bug", 'url' => array('/gameBugtracker/create', 'gameId' => $model->game_id)));
		array_push($this->menu, array('label' => "Zobacz bugi gry", 'url' => array('/gameBugtracker/view', 'id' => $model->game_id)));	
	}
}
?>
<h1><?php echo $model->name ?></h1>

<a href="<?php echo $model->url ?>" target="_blank"><b>Pobierz</b></a><br/>
<br/>
	Wydana przez: <b><?php echo $model->publisher->name ?></b><br/>
	Rozmiar: <b><?php echo $model->size ?> MB</b><br/>
<div id="screen">
	<?php
	if ($model->gameImage != null)
	{
		echo "<h2>Screen</h2>";
		echo CHtml::link(CHtml::image($model->gameImage->thumb_src), $model->gameImage->src);
	}
	?>
</div>
<div id="video">
	<?php
	if ($model->gameVideo != null)
	{
		echo "<h2>Video</h2>";
		echo CHtml::link(CHtml::image($model->gameVideo->preview_img), $model->gameVideo->src);
	}
	?>
</div>