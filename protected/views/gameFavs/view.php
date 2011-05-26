<?php
/* @var $model GameFavs */
$this->breadcrumbs = array(
	'GameFavs' => array('/gameFavs'),
	'view'
);
if (isset($isFavs))
{
	echo "<h3 style='color:red;'>Ta gra jest już w twoich ulubionych</h3>";
}
if (!empty($model))
{
	?>
	Twoje ulubione gry:

		<?php /* @var $Favs GameFavs */ $i = 0; ?>
		<?php foreach ($model as $favs): ?>
		<h2><?php echo++$i; ?>.
		<?php $gra = Game::model()->find('game_id=:game_id', array(':game_id' => $favs->game_id)) ?>
		<?php echo CHtml::link($gra->name, array('game/view', 'id' => $favs->game_id)); ?></h2>
	<?php endforeach; ?>


<?php } else
{ ?>
	<h2>Nie posiadasz jeszcze ulubionych gier</h2><br/>
	Jeżeli chcesz dodać jakaś grę przejdź do działu <?php echo CHtml::link('gry', array('game/index')); ?>
<?php } ?>