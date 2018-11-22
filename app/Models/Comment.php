<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record;
use App\User;
use Carbon\Carbon;

class Comment extends Model
{

  use SoftDeletes; 

	protected $table = "comments";
  protected $primaryKey = "id";
  protected $fillable = ['body','record_id','user_id'];
  protected $casts = [
  	'created_at' => 'date',
  	'updated_at' => 'date',
  	'deleted_at' => 'date',
  ];

	public static $rules = [
		'body' => 'required|min:5'
	];

	public function record()
  {
    return $this->belongsTo(Record::class, 'record_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getCreatedHoursAgo()
  {
    $current = Carbon::now();

    return $current->diffInHours($this->created_at);
  }

}
