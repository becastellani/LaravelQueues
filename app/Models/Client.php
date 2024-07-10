<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'razaoSocial',
        'email',
        'cpfCnpj',
        'phone',
        'zipcode',
        'address',
        'number',
        'complement',
        'neighborhood',
        'city_id',
    ];


    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
