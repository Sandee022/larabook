<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommanderTrait;

class RegistrationController extends \BaseController
{
	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

    /**
     * @param RegistrationForm $registrationForm
     */
    public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
		$this->beforeFilter('guest');
	}

	/*
	 * Show a form to register the user
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store new user to database
	 *
	 * @return string
	 */
	public function store()
	{
		$this->registrationForm->validate(Input::all());

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay('Glad to have you as a new larabook member!');

		return Redirect::home();
	}
}
