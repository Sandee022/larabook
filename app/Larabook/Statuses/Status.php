<?php namespace Larabook\Statuses;


use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent {

    use EventGenerator, PresentableTrait;
    /**
     * Fillable fields for a new status
     * @var array
     */
    protected $fillable = ['body'];

    protected $presenter = 'Larabook\Statuses\StatusPresenter';
    /**
     * Publish a new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));
        $status->raise(new StatusWasPublished($body));
        return $status;
    }

    /**
     * Status belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * @return mixed
     */
    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }
}