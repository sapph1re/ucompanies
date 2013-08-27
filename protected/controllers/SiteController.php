<?php

class SiteController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl'
		);
	}

	public function accessRules()
	{
		return array(
			array('deny',
				'actions' => array('main'),
				'users' => array('?')
			)
		);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest)
			$this->redirect(array('login'));
		else
			$this->redirect(array('main'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('main'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('login'));
	}

	/**
	 * Registers a new user
	 */
	public function actionRegister()
	{
		$model=new RegisterForm();

		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate())
			{
				$account = new Account();
				$account->attributes = $_POST['RegisterForm'];
				$account->password = $account->hashPassword($account->password);
				if ($account->save())
					$this->redirect(array('login'));
				else
					$model->addError('', 'Не удалось зарегистрировать пользователя.');
			}
		}
		$this->render('register', array('model' => $model));
	}

	/**
	 * Displays the main page, only for authorized users, guests are redirected to login page
	 */
	public function actionMain()
	{
		$dataProvider = new CActiveDataProvider('Account', array(
			'criteria' => array(
				'select' => array('email', 'company')
			),
			'pagination' => array(
				'pageSize' => 5
			),
			'sort' => array(
				'defaultOrder' => array(
					'id' => CSort::SORT_DESC
				)
			)
		));
		$this->render('main', array('dataProvider' => $dataProvider));
	}

	/**
	 * AJAX request handler for the "company" field's autocomplete
	 */
	public function actionGetCompanies($term)
	{
		$accounts = Account::model()->findAll(
			array(
				'select' => 'company',
				'distinct' => true,
				'condition' => 'company LIKE ?',
				'params' => array('%'.$term.'%')
			)
		);
		$companies = array();
		foreach ($accounts as $account)
			$companies[] = $account->company;
		echo CJSON::encode($companies);
		Yii::app()->end();
	}
}