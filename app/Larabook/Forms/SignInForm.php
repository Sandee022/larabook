<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    /**
     * Validation rules or the registration form
     *
     * @var array
     */
    protected $rules=[
        'email'    => 'required',
        'password' => 'required'
    ];

}