<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{

	use SoftDeletes;

  protected $table = "fields";
  protected $primaryKey = "id";
  protected $fillable = ['name','type','label','options'];

  public static $rules = [
		'name' => 'required',
		'type' => 'required'
	];

	public function fieldType()
  {
      return $this->hasOne(FieldType::class, 'id', 'type');
  }

	public function recordTypes()
	{
		return $this->belongsToMany(RecordType::class);
	}

	public function recordIds()
	{
		return $this->belongsToMany(Record::class);
	}

  public function recordValue()
  {
      return $this->belongsToMany(Record::class, 'field_values', 'field', 'record')->withPivot('value');
  }

  /*
   * Serializa las opciones para guardarlas en JSON
   *
   * @params $options|string
   * 
   * @returns array
   */
  public static function formatOptionsJSON($options)
  {
  	
  	$salida = [];

  	$options = explode(',',$options);

  	if(count($options) > 0){
	  	foreach ($options as $option) {

        if(strpos($option, ':')){
          $option = explode(':',$option);
          $salida[$option[0]] = $option[1];
        } else {
          $salida[$option] = $option;
        }
	  	}
  	}

  	return json_encode($salida);

  }

  /*
   * Formatea las opciones al formato del campo
   *
   * @params $options|string
   * 
   * @returns string
   */
  public static function formatOptionsString($options)
  {
  	
  	$salida = '';

    if($options != ''){
  	  $options = json_decode($options);
    	foreach ($options as $key => $value) {
        if($key == $value){
          $salida .= $key.',';
        } else {
          $salida .= $key.':'.$value.',';
        }
    	}
    }

  	return $salida;

  }

}