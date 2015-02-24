<?php

use Larabook\Statuses\LeaveCommentOnStatusCommand;
use Laracasts\Commander\CommanderTrait;

class CommentsController extends \BaseController {

 	use CommanderTrait;

	/**
	 * Leave new comment.
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch the input
		$input = array_add(Input::get(), 'user_id', Auth::id());


		//execute the command leave a comment
		$this->execute(LeaveCommentOnStatusCommand::class, $input);


		//go back
		return Redirect::back();
	}
}