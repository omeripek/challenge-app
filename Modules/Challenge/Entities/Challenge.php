<?php

namespace Modules\Challenge\Entities;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
	protected $table = "challenge";
	
    protected $fillable = [
    	'playerXId', 'playerYId', 'challengeDetailId', 'score'
    ];
}
