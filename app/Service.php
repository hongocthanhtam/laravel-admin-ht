<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ServiceCategory;
use App\MobileGame;
use App\MobileApp;

class Service extends Model
{
    protected $table='services';
    protected $fillable = [
        'id', 'name', 'content', 'icon'
    ];
    public function service_categories()
    {
        return $this->hasMany(ServiceCategory::class);
    }
}
