<?php
$this->breadcrumbs=array(
	'Games'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Game', 'url'=>array('index')),
	array('label'=>'Create Game', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('game-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Games</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'game-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'game_id',
		'publisher_id',
		'user_id',
		'name',
		'version',
		'type',
		/*
		'size',
		'downloads',
		'url',
		'comments',
		'images',
		'videos',
		'bugtracker_enabled',
		'voting_enabled',
		'comments_enabled',
		'votes',
		'score',
		'staff_fav',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
