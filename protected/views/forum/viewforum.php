<?php
$this->breadcrumbs = array(
	'Forum' => array('/forum'),
	'Viewforum',
);
?>
<h1>Katagoria: <?php echo $forum->name ?></h1>

<?php echo CHtml::link('+ Nowy temat', array('forum/posting', 'id' => $forum->forum_id, 'topic' => 0)); ?>
<div>&nbsp;</div>
<table class="tg-table">
	<tr>
		<th style="width: 70%">Temat</th>
		<th style="width: 10%">Odpowiedzi</th>
		<th style="width: 20%">Ostatni post</th>
	</tr>

	<?php if ($total == 0): ?>
		<tr>
			<td colspan="3">Ups, nikt nic jeszcze nie napisał w tym dziale!</td>
		</tr>
	<?php else: ?>
		<tr>
			<td colspan="3">Tutaj powinny być widoczne tematy... ale jeszcze tego nie zrobiłem!</td>
		</tr>
	<?php endif; ?>
</table>
