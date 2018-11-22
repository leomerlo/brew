<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{

  protected $table = "field_types";
  protected $primaryKey = "id";

	public function field()
  {
      return $this->belongsTo(Field::class);
  }

}
