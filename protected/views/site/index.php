<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Witawy w serwisie <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if (Yii::app()->user->isGuest): ?>
Jeśli posiadasz konto to <?php echo CHtml::link('zaloguj się', array('/site/login')); ?>. W przeciwnym wypadku <?php echo CHtml::link('zarejestruj się', array('/site/register')); ?>, aby móc w pełni korzystać z dobrodziejstw strony. 
<?php else: ?>
Witaj <b><?php echo Yii::app()->user->name ?></b>!<br/>
<br/>
<h2>Profil</h2>
&raquo; <?php echo CHtml::link('Zobacz swój profil', array('profile/view')); ?><br/>
&raquo; <?php echo CHtml::link('Edytuj swój profil', array('profile/update')); ?><br/>
<br/>
<h2>Team/Wydawca</h2>
&raquo; <?php echo CHtml::link('Utwórz nowy zespół', array('publisher/add')); ?><br/>
&raquo; <?php echo CHtml::link('Zobacz zespoły', array('/publisher')); ?><br/>
<br/>
<h2>News</h2>
&raquo; <?php echo CHtml::link('Zobacz newsy', array('/news')); ?><br/>

<?php endif; ?>

<?php 

//echo $this->renderPartial('//news/index', array()); ?>