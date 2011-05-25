<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ranking_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ranking_id), array('view', 'id'=>$data->ranking_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ranking_creator')); ?>:</b>
	<?php echo CHtml::encode($data->ranking_creator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rules')); ?>:</b>
	<?php echo CHtml::encode($data->rules); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winner')); ?>:</b>
	<?php echo CHtml::encode($data->winner); ?>
	<br />


</div>