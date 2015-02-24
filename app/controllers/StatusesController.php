<?php

use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Laracasts\Commander\CommanderTrait;

class StatusesController extends \BaseController {


	/**
	 * @var StatusRepository
	 */
	private $statusRepository;
	/**
	 * @var PublishStatusForm
	 */
	private $publishStatusForm;

	public function __construct(PublishStatusForm $publishStatusForm,StatusRepository $statusRepository)
	{

		$this->statusRepository = $statusRepository;
		$this->publishStatusForm = $publishStatusForm;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getFeedForUser(Auth::user());
		return View::make('statuses.index',compact('statuses'));
	}


	/**
	 * Save a new status.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->publishStatusForm->validate($input);

		$this->execute(PublishStatusCommand::class, $input);

		Flash::message('Your status has been updated!');

		return Redirect::back();
	}


}
