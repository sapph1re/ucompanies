<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name.' - Вход';
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'login-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
	'htmlOptions' => array(
		'class' => 'form-signin'
	)
)); ?>

	<h2 class="form-signin-heading">Вход</h2>

	<div class="row">
		<?php echo $form->textField($model, 'email', array(
			'placeholder' => $model->getAttributeLabel('email'),
			'title' => $model->getAttributeLabel('email'),
			'class' => 'form-control'
		)); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model, 'password', array(
			'placeholder' => $model->getAttributeLabel('password'),
			'title' => $model->getAttributeLabel('password'),
			'class' => 'form-control'
		)); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row rememberMe">
		<label class="checkbox">
			<?php echo $form->checkBox($model, 'rememberMe'); ?>
			<?php echo $model->getAttributeLabel('rememberMe'); ?>
		</label>
		<?php echo $form->error($model, 'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Войти', array(
			'class' => 'btn btn-lg btn-primary btn-block'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>