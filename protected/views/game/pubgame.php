<h1>Lista wszystkich gier wydawcy <?php echo $pub_name; ?> </h1>

<?php /* @var $gra Game */ $i = 0; ?>
<?php foreach ($model as $gra): ?>
	<h2><?php echo ++$i; ?>.
	<?php echo CHtml::link($gra->name, array('game/view', 'id' => $gra->game_id)); ?></h2>
<?php endforeach; ?>
