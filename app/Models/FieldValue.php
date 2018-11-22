<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldValue extends Model
{

		use SoftDeletes;

		protected $table = 'field_values';

		protected $fillable = ['value','field','record'];

		public function field()
	  {
	    return $this->belongsTo(Field::class, 'field');
	  }		
		
}
