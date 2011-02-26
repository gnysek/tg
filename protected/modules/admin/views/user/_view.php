<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autokey')); ?>:</b>
	<?php echo CHtml::encode($data->autokey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regdate')); ?>:</b>
	<?php echo CHtml::encode($data->regdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode($data->from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bday')); ?>:</b>
	<?php echo CHtml::encode($data->bday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_name')); ?>:</b>
	<?php echo CHtml::encode($data->real_name); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_time')); ?>:</b>
	<?php echo CHtml::encode($data->last_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ban')); ?>:</b>
	<?php echo CHtml::encode($data->ban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin')); ?>:</b>
	<?php echo CHtml::encode($data->admin); ?>
	<br />

	*/ ?>

</div>