<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'agent_id',
        'user_name',
        'email',
        'message',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    protected $appends = [
        'time_ago'
    ];

    public function getTimeAgoAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function agent()
    {
        return $this->belongsTo('App\Models\User', 'agent_id');
    }
}
