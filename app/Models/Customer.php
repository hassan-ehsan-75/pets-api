<?php

namespace App\Models;

use App\Scopes\CustomerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table='users';

    public function pets(){
        return $this->hasMany(Pet::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CustomerScope);
    }
}
