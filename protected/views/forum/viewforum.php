<?php
/* @var $fcat Fcat */
$this->breadcrumbs = array(
	'Forum' => array('/forum'),
	$fcat->forum->name => array('/forum'),
	$fcat->name,
);
?>
<h1>Kategoria: <?php echo $fcat->forum->name . '/' . $fcat->name ?></h1>

<?php echo CHtml::link('+ Nowy temat', array('forum/posting', 'id' => $fcat->forum_id, 'topic' => 0)); ?>
<div>&nbsp;</div>
<table class="tg-table">
	<tr>
		<th style="width: 70%">Temat</th>
		<th style="width: 10%">Odpowiedzi</th>
		<th style="width: 20%">Ostatni post</th>
	</tr>

	<?php if ($total == 0): ?>
		<tr>
			<td colspan="3" style="text-align: center;">Ups, nikt nic jeszcze nie napisał w tym dziale =)</td>
		</tr>
	<?php else: ?>
		<?php
		$this->widget('zii.widgets.CListView', array(
			'dataProvider' => $dataProvider,
			'itemView' => '_viewforum',
			'viewData' => array(),
			'enablePagination' => true,
		));
		?>
	<?php endif; ?>
</table>
