<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->member_id), array('view', 'id'=>$data->member_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisher_id')); ?>:</b>
	<?php echo CHtml::encode($data->publisher_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisher_admin')); ?>:</b>
	<?php echo CHtml::encode($data->publisher_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisher_staff_role')); ?>:</b>
	<?php echo CHtml::encode($data->publisher_staff_role); ?>
	<br />


</div>