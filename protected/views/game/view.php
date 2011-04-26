<?php
/* @var $model Game */
$this->breadcrumbs = array(
	'Game' => array('/game'),
	$model->name,
);

if ($model->publisher->isPublisherAdmin())
{
	if ($model->gameImage == null)
		$this->menu = array(
			array(
				'label' => "Dodaj screen'a",
				'url' => array('/gameImage/create', 'gameId' => $model->game_id)
			)
		);
	else
		$this->menu = array(
			array(
				'label' => "Edytuj screen'a",
				'url' => array('/gameImage/update', 'gameId' => $model->game_id)
			),
			array(
				'label' => "Usuń screen'a",
				'url' => '#',
				'linkOptions' => array('submit' => array('/gameImage/delete', 'gameId' => $model->game_id), 'confirm' => 'Czy napewno chcesz to zrobić ?')
			)
		);
}
?>
<h1><?php echo $model->name ?></h1>

<a href="<?php echo $model->url ?>" target="_blank"><b>Pobierz</b></a><br/>
<br/>
Wydana przez: <b><?php echo $model->publisher->name ?></b><br/>
Rozmiar: <b><?php echo $model->size ?> MB</b><br/><br/>
<div>
	<?php
	if ($model->gameImage != null)
		echo CHtml::link(CHtml::image($model->gameImage->thumb_src), $model->gameImage->src);
	?>
</div>