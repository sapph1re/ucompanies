<?php
/* @var $this SiteController */
/* @var $model RegisterForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name." - Регистрация";
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form-register-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true
	),
	'htmlOptions' => array(
		'class' => 'form-signup'
	)
)); ?>

	<h2 class="form-signup-heading">Регистрация</h2>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array(
			'class' => 'form-control'
		)); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password', array(
			'class' => 'form-control'
		)); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'repassword'); ?>
		<?php echo $form->passwordField($model, 'repassword', array(
			'class' => 'form-control'
		)); ?>
		<?php echo $form->error($model, 'repassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'company'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model' => $model,
			'attribute' => 'company',
			'sourceUrl' => array('getCompanies'),
			'options' => array(
				'minLength' => 2
			),
			'htmlOptions' => array(
				'class' => 'form-control',
				'autocomplete' => 'off'
			)
		)); ?>
		<?php echo $form->error($model, 'company'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Зарегистрироваться', array(
			'class' => 'btn btn-lg btn-primary btn-block'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>