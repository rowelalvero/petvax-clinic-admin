<?php

namespace Modules\World\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\World\Models\State;

class City extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = ['name','country_id','state_id','status'];

     protected $casts = [
     
        'state_id' => 'integer',
        'country_id' => 'integer',
        'status' => 'integer',

     ];



    protected static function newFactory()
    {
        return \Modules\World\Database\factories\CityFactory::new();
    }
    public function city()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
