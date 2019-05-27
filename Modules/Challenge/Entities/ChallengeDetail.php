<?php

namespace Modules\Challenge\Entities;

use Illuminate\Database\Eloquent\Model;

class ChallengeDetail extends Model
{
	protected $table = "challenge_detail";

    protected $fillable = [
    	'questionList', 'playerXAnswerList', 'playerYAnswerList'
    ];
}
