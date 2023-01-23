<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ["DNI","nombre","apellidos","telefono","email"];
    public function order(){
        return $this->hasOne(Order::class);
    }
}
