<div style="width:320px; float: left;">
	<div id="coin-slider">
		<?php foreach ($modelImg as $img): ?>
			<a href="#">
				<?php /* some kind of fucking magic... trzeba to potem zmienic, hardkoded na szybko ;) */
					$src = '/upload/' . $img->game_id . '/glowna_' . $img->src;
					if (!file_exists( wr() . $src)) {
						copy( wr() . '/upload/' . $img->game_id . '/' . $img->src, wr() . $src);
						$image = Yii::app()->image->load(wr() . $src);
						$image->resize(320, 240, 1)->quality(75);
						$image->save();
					}
				?>
				
				<?php echo CHtml::image( bu() . $src ); ?>
				<span><?php echo $img->game->name ?></span>
			</a>
		<?php endforeach; ?>
	</div>
</div>


<div style="float: right;" class="span-14">
	<h1>Newsroom</h1>
	<?php $this->renderPartial('//news/index',array('model'=>$model)); ?>
</div>

<div class="clearfix"></div>



<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider({
			width: 320,
			height: 240,
			spw: 3,
			sph: 4,
			sDelay: 10
		});
	});
</script>
