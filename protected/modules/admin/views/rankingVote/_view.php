<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->entry_id), array('view', 'id'=>$data->entry_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />


</div>