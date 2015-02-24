<?php namespace Larabook\Statuses;

class Comment extends \Eloquent {

    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }

    /**
     * @param $body
     * @param $status_id
     * @return static
     */
    public static function leave($body, $status_id)
    {
        return new static([
            'body' => $body,
            'status_id' => $status_id
        ]);
    }
}