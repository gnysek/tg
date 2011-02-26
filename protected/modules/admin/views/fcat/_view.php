<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cat_id), array('view', 'id'=>$data->cat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forum_id')); ?>:</b>
	<?php echo CHtml::encode($data->forum_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pos')); ?>:</b>
	<?php echo CHtml::encode($data->pos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topics_total')); ?>:</b>
	<?php echo CHtml::encode($data->topics_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posts_total')); ?>:</b>
	<?php echo CHtml::encode($data->posts_total); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_post_data')); ?>:</b>
	<?php echo CHtml::encode($data->last_post_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($data->visible); ?>
	<br />

	*/ ?>

</div>