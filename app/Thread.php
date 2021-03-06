<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $guarded = [];

    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}"; //inline with double quotes
//        return '/threads/' . $this->channel->slug . '/' . $this->id; /* backslash before threads is very imp */
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id'); //need to explicit that foreignKey is called user_id not owner id.
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);

    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
