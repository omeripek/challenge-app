<?php

namespace Modules\Challenge\Entities;

use Illuminate\Database\Eloquent\Model;

class ChallengeRequest extends Model
{
	protected $table = "challenge_request";

    protected $fillable = [
    	'playerXId', 'playerXConfirm', 'playerYId', 'playerYConfirm'
    ];

    public function playerX() {
    	return $this->belongsTo('App\User', 'playerXId', 'id');
	}

	public function playerY() {
    	return $this->belongsTo('App\User', 'playerYId', 'id');
	}
}
