<?php
/* @var $model Game */
$this->breadcrumbs = array(
	'Game' => array('/game'),
	$model->name,
);

if ($model->publisher->isPublisherAdmin())
{
	$this->menu = array(
		array('label' => "Dodaj screen'a", 'url' => array('/gameImage/create', 'gameId' => $model->game_id)),
		array('label' => "Dodaj video", 'url' => array('/gameVideo/create', 'gameId' => $model->game_id)),
		array('label' => "Edytuj grę", 'url' => array('/game/update', 'id' => $model->game_id, 'pub' => $model->publisher->name))
	);

	if ($model->bugtracker_enabled == 1)
		array_push($this->menu, array('label' => "Zobacz swoje bugi", 'url' => array('/gameBugtracker/view', 'id' => $model->game_id)));
} else {
	if ($model->bugtracker_enabled == 1)
	{
		$this->menu = array(
			array('label' => "Add bug", 'url' => array('/gameBugtracker/create', 'gameId' => $model->game_id)),
			array('label' => "Zobacz bugi gry", 'url' => array('/gameBugtracker/view', 'id' => $model->game_id))
		);
	}
}
?>
<h1><?php echo $model->name ?></h1>

<a href="<?php echo $model->url ?>" target="_blank"><b>Pobierz</b></a><br/>
<br/>
	Wydana przez: <b><?php echo $model->publisher->name ?></b><br/>
	Rozmiar: <b><?php echo $model->size ?> MB</b><br/>
<div id="screens">
	<?php if (count($model->gameImage) > 0) { ?>
	<h2>Screens</h2>
	<?php foreach ($model->gameImage as $image) { ?>		
	<div>
		<?php echo CHtml::link(CHtml::image($image->thumb_src), $image->src, array('target'=>'_blank')); ?>
		<?php if ($model->publisher->isPublisherAdmin()) { ?>
		<p>
			<?php
				echo CHtml::link('Edytuj', array(
					'/gameImage/update',
					'id'=>$image->image_id,
					'gameId' => $image->game_id)
				);
				
				echo " | ";
				
				echo CHtml::link('Usuń', '#', array(
						'submit' => array(
							'/gameImage/delete',
							'id' => $image->image_id,
							'gameId' => $image->game_id
						),
						'confirm' => "Czy napewno chcesz to zrobić ?"
					)
				);
			?>
		</p>
		<?php } ?>
	</div>
	<?php } } ?>
</div>
<div id="videos">
	<?php if (count($model->gameVideo) > 0) { ?>
	<h2>Videos</h2>
	<?php foreach ($model->gameVideo as $video) { ?>
	<div>
		<?php echo CHtml::link(CHtml::image($video->preview_img), $video->src, array('target'=>'_blank')); ?>
		<?php if ($model->publisher->isPublisherAdmin()) { ?>
		<p>
			<?php
				echo CHtml::link('Edytuj', array(
					'/gameVideo/update',
					'id'=>$video->video_id,
					'gameId' => $video->game_id)
				);
				
				echo " | ";
				
				echo CHtml::link('Usuń', '#', array(
						'submit' => array(
							'/gameVideo/delete',
							'id' => $video->video_id,
							'gameId' => $video->game_id
						),
						'confirm' => "Czy napewno chcesz to zrobić ?"
					)
				);
			?>
		</p>
		<?php } ?>
	</div>
	<?php } } ?>
</div>