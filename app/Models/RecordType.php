<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\RecordType
 *
 * @property int $id
 * @property string $type
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Record[] $records
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RecordType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RecordType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RecordType whereIdRecord Type($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RecordType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RecordType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RecordType extends Model
{

    use SoftDeletes;

    protected $table = "record_types";
    protected $primaryKey = "id";
    protected $fillable = ['type','slug','show_on_menu'];

    public static $rules = [
		'type' => 'required|min:3',
	];

    public function records()
    {
    	return $this->hasMany(Record::class, 'record_type');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }
}
