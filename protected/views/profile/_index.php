<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('social_status')); ?>:</b>
	<?php echo CHtml::encode($data->social_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posts')); ?>:</b>
	<?php echo CHtml::encode($data->posts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('games')); ?>:</b>
	<?php echo CHtml::encode($data->games); ?>
	<br />

</div>