<?php
$this->breadcrumbs=array(
	'Forum',
);?>

<table class="tg-table">
<?php
/* @var $forum Forum */
/* @var $cat FCat */
foreach ($model as $forum):
?>

	<tr>
		<td colspan="5" style="padding:0px; border: none;">
			<div class="prebar">
				<div class="bar">
					<div><b><?php echo $forum->name ?></b></div>
				</div>
			</div>	
		</td>
	</tr>
	<?php foreach ($forum->fcats as $cat): ?>
	<tr>
		<td style="width: 60%;"><b><?php echo CHtml::link($cat->name, array('forum/viewforum/', 'id' => $cat->cat_id)); ?></b><div style="font-size: 9px;"><?php echo $cat->desc ?></div></td>
		<td style="width: 10%;"><?php echo $cat->topics_total ?> Tematów</td>
		<td style="width: 10%;"><?php echo $cat->posts_total ?> Postów</td>
		<td style="width: 20%">
			<?php
				// deal with data
				$last_data = unserialize($cat->last_post_data);
				if (!empty($last_data)) {
					echo CHtml::link($last_data['user_name'], array('user','id'=>$last_data['user_id']));
					//echo $last_data['pid'];
					echo '<br/>';
					echo date('d M y, H:i:s',$last_data['time']);
				} else {
					echo 'Forum puste =)';
				}
			?>
		</td>
	</tr>
	<?php endforeach; ?>

<?php endforeach; ?>
</table>
