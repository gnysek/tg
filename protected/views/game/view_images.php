<h2>Screeny</h2>
<?php foreach ($model->gameImage as $image): ?>		
	<div style="float: left; margin: 0 10px 10px 0;">
		<?php
		echo CHtml::link(
				CHtml::image(
						'upload/' . $model->game_id . '/' . $image->thumb_src,
						$image->title,
						array('style'=>'border: 1px solid black;')
				),
				'upload/' . $model->game_id . '/' . $image->src,
				array('target' => '_blank', 'rel' => 'facebox', 'title' => $image->title)
		);
		?>
		<?php if ($model->publisher->isPublisherAdmin()): ?>
			<p>
			<?php
			echo CHtml::link('Edytuj', array(
				'/gameImage/update',
				'id' => $image->image_id,
				'gameId' => $image->game_id)
			);

			echo " | ";

			echo CHtml::link('Usuń', '#', array(
					'submit' => array(
						'/gameImage/delete',
						'id' => $image->image_id,
						'gameId' => $image->game_id
					),
					'confirm' => "Czy napewno chcesz to zrobić ?"
				));
			?>
			</p>
			<?php endif; ?>
	</div>
<?php endforeach; ?>
<div class="clearfix"></div>