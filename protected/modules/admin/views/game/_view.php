<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->game_id), array('view', 'id'=>$data->game_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisher_id')); ?>:</b>
	<?php echo CHtml::encode($data->publisher_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('downloads')); ?>:</b>
	<?php echo CHtml::encode($data->downloads); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('images')); ?>:</b>
	<?php echo CHtml::encode($data->images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('videos')); ?>:</b>
	<?php echo CHtml::encode($data->videos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bugtracker_enabled')); ?>:</b>
	<?php echo CHtml::encode($data->bugtracker_enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voting_enabled')); ?>:</b>
	<?php echo CHtml::encode($data->voting_enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments_enabled')); ?>:</b>
	<?php echo CHtml::encode($data->comments_enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('votes')); ?>:</b>
	<?php echo CHtml::encode($data->votes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_fav')); ?>:</b>
	<?php echo CHtml::encode($data->staff_fav); ?>
	<br />

	*/ ?>

</div>