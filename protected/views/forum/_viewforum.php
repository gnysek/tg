<?php /* @var $data Topic */ ?>
<tr>
	<td><?php echo CHtml::link($data->title, array('forum/viewtopic', 'id'=>$data->topic_id)); ?></td>
	<td><?php echo $data->posts; ?></td>
	<td><?php echo 'ToDo =)'; ?></td>
</tr>
