<?php

namespace Modules\Tax\Models;

use App\Models\BaseModel;
use App\Trait\CommonQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;



class Tax extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use CommonQuery;

    protected $table = 'taxes';
    protected $casts = [
        'value' => 'double',
        'status'=> 'integer',
      ];
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

     public function getValueAttribute($value)
    {
        return number_format((float) $value, 2, '.', '');
    }
    protected static function newFactory()
    {
        return \Modules\Tax\database\factories\TaxFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
