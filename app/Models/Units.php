<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $city_id
 * @property string $description
 * @property string $phone
 * @property string $zip_code
 * @property string $address
 * @property string $number
 * @property string $distric
 * @property string $complement
 * @property City $city
 */
class Units extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['city_id', 'description', 'phone', 'zip_code', 'address', 'number', 'extension', 'distric', 'complement'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public $timestamps = false;
}
