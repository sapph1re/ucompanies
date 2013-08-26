<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $email;
	public $password;
	public $repassword;
	public $company;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('email, password, repassword, company', 'required'),
			array('email', 'email'),	// valid email address
			array('email', 'length', 'max' => 100),
			array('company', 'length', 'max' => 120),
			array('email', 'unique', 'className' => 'Account', 'attributeName' => 'email', 'caseSensitive' => false),
			array('repassword', 'compare', 'compareAttribute' => 'password')
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'email' => 'E-mail',
			'password' => 'Пароль',
			'repassword' => 'Повторите пароль',
			'company' => 'Компания'
		);
	}
}