<?php /* @var $data Topic */ ?>
<tr>
	<td><?php echo CHtml::link($data->title, array('forum/viewtopic', 'id'=>$data->topic_id)); ?></td>
	<td><?php echo $data->posts; ?></td>
	<td>
	<?php
		// deal with data
		$last_data = unserialize($data->topic_data);
		if (!empty($last_data)) {
			echo CHtml::link($last_data['user_name'], array('user','id'=>$last_data['user_id']));
			//echo $last_data['pid'];
			echo '<br/>';
			echo date('d M y, H:i:s',$last_data['time']);
		}
	?>
	</td>
</tr>
