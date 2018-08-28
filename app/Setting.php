<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting.
 *
 * @author  The scaffold-interface created at 2018-08-28 01:50:00pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Setting extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'settings';

	
}
