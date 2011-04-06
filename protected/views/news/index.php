<?php
$this->breadcrumbs=array(
	'Niusy',
);

foreach ($model as $news)
{ ?>
	<div style="border: 1px solid #000000;">
		<h1>Temat:<?php echo CHtml::link($news->title,array('/news/view/','id'=>$news->content_id)); ?></h1>Autor: <?php echo $news->content->user->name; ?><br/>
		<h3>Treść:<?php echo $news->text; ?></h3><br/>
		<h2>Treść-długa:<?php echo $news->more; ?></h2><br/>
	</div>
	
	
<?php 

} ?>