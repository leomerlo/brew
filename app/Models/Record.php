<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;
use App\Models\Field;

class Record extends Model
{
  use SoftDeletes;

  protected $table = "records";
  protected $primaryKey = "id";
  protected $fillable = ['title','slug','show_on_menu'];
  protected $casts = [
  	'created_at' => 'date',
  	'updated_at' => 'date',
  	'deleted_at' => 'date',
  ];

	public static $rules = [
		'title' => 'required|min:3',
		'slug' => 'min:3|unique:records,slug',
	];

  public function rel_record_type()
  {
    return $this->belongsTo(RecordType::class, 'record_type');
  }

  public function rel_user()
  {
    return $this->belongsTo(User::class, 'user');
  }

  public function fields()
  {
      return $this->belongsToMany(Field::class);
  }

  public function fieldsValues()
  {
      return $this->hasMany(FieldValue::class, 'record');
  }

  public function getExistingFieldsAttribute()
  {
      $salida = [];
      foreach ($this->fieldsValues as $aField) {
          $salida[$aField->field] = $aField;
      }
      return $salida;
  }

  public function dateFormat() {
    return Carbon::parse($this->created_at)->format('d-m-Y');
  }

  public function getCreatedDageAgo()
  {
    $current = Carbon::now();

    return $current->diffInDays($this->created_at);
  }

  public function getAllFieldsWithValuesAttribute()
  {
    $fields = array_merge($this->fields()->with('fieldType')->get()->toArray(),$this->rel_record_type->fields()->with('fieldType')->get()->toArray());

    foreach ($fields as $i => $field) {
      if(isset($this->existingFields[$fields[$i]['id']])){
        $fields[$i]['value'] = $this->existingFields[$fields[$i]['id']]['value'];
      } else {
        $fields[$i]['value'] = '';
      }
      
    }

    return $fields;
  }

  public function comments()
  {
      return $this->hasMany(Comment::class);
  }
	
}
