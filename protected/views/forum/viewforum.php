<?php
/* @var $fcat Fcat */
$this->breadcrumbs = array(
	'Forum' => array('/forum'),
	$fcat->forum->name => array('/forum'),
	$fcat->name,
);
?>
<div class="prebar">
	<div class="bar">
		<div><b><?php echo $fcat->forum->name . ' &raquo; ' . $fcat->name ?></b></div>
	</div>
</div>	

<?php echo CHtml::link('+ Nowy temat', array('forum/posting', 'id' => $fcat->forum_id, 'topic' => 0), array('class'=>'newtopic')); ?>
<br/>
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
<?php echo CHtml::link('+ Nowy temat', array('forum/posting', 'id' => $fcat->forum_id, 'topic' => 0), array('class'=>'newtopic')); ?>
