<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tg.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

		<link rel="icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fav.png">

			<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>

		<div class="container" id="page">

			<div id="header">
				<div id="logo">
					<div id="logotext">
						<?php echo CHtml::link(Yii::app()->name, array('/')); ?>
					</div>
					<div id="logomenu">
						<?php
						$this->widget('zii.widgets.CMenu', array(
							'items' => array(
								array('label' => 'Główna', 'url' => array('/site/index')),
								//array('label' => 'Newsy', 'url' => array('/news')),
								//array('label' => 'Forum', 'url' => array('/forum')),
								//array('label' => 'Gry', 'url' => array('/game')),
								array('label' => 'Wydawcy', 'url' => array('/publisher')),
								//array('label' => 'Rankingi', 'url' => array('/ranking')),
								//array('label' => 'About', 'url' => array('/site/page')),
								//array('label' => 'Kontakt', 'url' => array('/site/contact')),
								array('label' => 'Admin', 'url' => array('/admin'), 'visible' => Yii::app()->user->admin),
								array('label' => 'Zaloguj', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
								array('label' => 'Rejestracja', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
								array('label' => 'Profil', 'url' => array('/profile'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Wyloguj (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
							),
						));
						?>
					</div><!-- mainmenu -->
					<div class="clear"></div>
				</div><!-- logo -->
			</div><!-- header -->

			<?php
			$this->widget('zii.widgets.CBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			));
			?><!-- breadcrumbs -->

			<?php echo $content; ?>

			<?php
			$this->widget('zii.widgets.CBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			));
			?><!-- breadcrumbs -->

			<div id="footer">
				<div id="footer-c2">
					<?php echo CHtml::link('Główna', array('/')); ?><br/>
					<?php //echo CHtml::link('Aktualności', array('/news')); ?><br/>
					<?php //echo CHtml::link('O nas', array('/site/page', 'view' => 'about')); ?><br/>
					<?php //echo CHtml::link('Kontakt', array('/site/contact')); ?>
				</div>
				<div id="footer-c1">Copyright &copy; <?php echo date('Y'); ?></div>
				<div class="clear"></div>
			</div><!-- footer -->

		</div><!-- page -->

	</body>
</html>