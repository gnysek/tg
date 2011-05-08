<?php
$this->breadcrumbs = array(
	'Forum' => array('/forum'),
	'Viewtopic',
);
?>
<h1>Temat: <?php echo $topic->title ?></h1>

<?php echo CHtml::link('+ Nowa odpowiedź', array('forum/posting', 'id' => $topic->forum_id, 'topic' => $topic->topic_id)); ?>
<div>&nbsp;</div>
<table class="tg-table">
	<tr>
		<th style="width: 20%">Autor</th>
		<th style="width: 80%">Treść</th>
	</tr>

	<?php
	$this->widget('zii.widgets.CListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '_viewtopic',
		'viewData' => array(),
		'enablePagination' => true,
	));
	?>
</table>
<div>&nbsp;</div>
<?php echo CHtml::link('+ Nowa odpowiedź', array('forum/posting', 'id' => $topic->forum_id, 'topic' => $topic->topic_id)); ?>
