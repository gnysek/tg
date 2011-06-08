<div style="width:320px; float: left;">
	<div class="prebar">
		<div class="bar">
			<div>Najnowsze screeny</div>
		</div>
	</div>
	
	<div id="coin-slider" class="black-border">
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
	
	<div class="prebar">
		<div class="bar">
			<div>TworzęGry.pl</div>
		</div>
		
		<ul>
			<li>Prezentuj swoje gry</li>
			<li>Pytaj i dziel się na forum</li>
			<li>Testuj gry w fazie beta</li>
			<li>Twórz rankingi i zwyciężaj</li>
		</ul>
	</div>
	
</div>


<div style="float: right;" class="span-14">
	<div class="prebar">
		<div class="bar">
			<div>Newsroom</div>
		</div>
	</div>
	<?php $this->renderPartial('//news/index',array('model'=>$model)); ?>
	<?php echo CHtml::link('Pełen newsroom &raquo;', array('/news')); ?>
</div>

<div class="clearfix"></div>



<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider({
			width: 320,
			height: 240,
//			spw: 3,
//			sph: 4,
			sDelay: 10
		});
	});
</script>
