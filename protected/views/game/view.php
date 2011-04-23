<?php
/* @var $model Game */
$this->breadcrumbs = array(
	'Game' => array('/game'),
	'View',
);
?>
<h1><?php echo $model->name ?></h1>

<a href="<?php echo $model->url ?>" target="_blank"><b>Pobierz</b></a><br/>
<br/>
Wydana przez: <b><?php echo $model->publisher->name ?></b><br/>
Rozmiar: <b><?php echo $model->size ?> MB</b><br/>
