<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;
use Carbon\Carbon;

class JobBid extends Model
{
    use InsertOnDuplicateKey;

    const CANCELLED 	= 'cancelled';
    const COMPLETED 	= 'completed';
    const PENDING 		= 'pending';
    const INVITED 		= 'invited';


    public function setPreferredTimeAttribute($value='')
    {
        $this->attributes['preferred_time'] = Carbon::parse($value)->toTimeString();
    }

    public function setPreferredDateAttribute($value='')
    {

        $this->attributes['preferred_date'] = Carbon::parse($value)->toDateTimeString();
    }

}

