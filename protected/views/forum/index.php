<?php
$this->breadcrumbs=array(
	'Forum',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<table class="tg-table">
<?php
/* @var $forum Forum */
/* @var $cat FCat */
foreach ($model as $forum):
?>

	<tr>
		<th colspan="5"><b><?php echo $forum->name ?></b></th>
	</tr>
	<?php foreach ($forum->fcats as $cat): ?>
	<tr>
		<td style="width: 80%;"><b><?php echo CHtml::link($cat->name, array('forum/viewforum/', 'id' => $cat->cat_id)); ?></b><div style="font-size: 9px;"><?php echo $cat->desc ?></div></td>
		<td style="width: 10%;"><?php echo $cat->topics_total ?> Tematów</td>
		<td style="width: 10%;"><?php echo $cat->posts_total ?> Postów</td>
	</tr>
	<?php endforeach; ?>

<?php endforeach; ?>
</table>
