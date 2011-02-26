<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->topic_id), array('view', 'id'=>$data->topic_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forum_id')); ?>:</b>
	<?php echo CHtml::encode($data->forum_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posts')); ?>:</b>
	<?php echo CHtml::encode($data->posts); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('topic_data')); ?>:</b>
	<?php echo CHtml::encode($data->topic_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_post_data')); ?>:</b>
	<?php echo CHtml::encode($data->last_post_data); ?>
	<br />

	*/ ?>

</div>