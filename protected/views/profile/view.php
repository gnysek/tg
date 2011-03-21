<?php
$this->breadcrumbs = array(
	"Twój profil",
);

$this->menu = array(
	array('label' => 'Edytuj', 'url' => array('update')),
	array('label' => 'Zobacz swoje teamy', 'url' => array('/publisher')),
);
?>

<h1>Profil: <?php echo $model->name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'name',
		'email',
		array(
			'name'=>'regdate',
			'value'=> CHtml::encode($model->getRegDateText())
		),
		array(
			'name' => 'sex',
			'value' => CHtml::encode($model->getSexText())
		),
		'from',
		'bday',
		'real_name',
		array(
			'name'=>'last_time',
			'value'=> CHtml::encode($model->getLastTimeText())
		),
		'social_status',
		array(
			'name'=>'avatar',
			'type'=>'raw',
			'value' => CHtml::image("avatars/{$model->name}/{$model->avatar}")
		),
		'posts',
		'games'
	),
));
?>
