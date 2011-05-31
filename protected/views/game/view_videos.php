<h2>Videos</h2>
<?php foreach ($model->gameVideo as $video): ?>
	<div style="float: left; margin: 0 10px 10px 0;">
		<?php echo CHtml::link(CHtml::image($video->preview_img), array('gameVideo/viewYoutube', 'id' => $video->video_id), array('target' => '_blank', 'rel' => 'facebox', 'title' => $video->title)); ?>
			<?php if ($model->publisher->isPublisherAdmin())
			{ ?>
			<p>
				<?php
				echo CHtml::link('Edytuj', array(
					'/gameVideo/update',
					'id' => $video->video_id,
					'gameId' => $video->game_id)
				);

				echo " | ";

				echo CHtml::link('Usuń', '#', array(
					'submit' => array(
						'/gameVideo/delete',
						'id' => $video->video_id,
						'gameId' => $video->game_id
					),
					'confirm' => "Czy napewno chcesz to zrobić ?"
				)
				);
				?>
			</p>
	<?php } ?>
	</div>
<?php endforeach; ?>
<div class="clearfix"></div>