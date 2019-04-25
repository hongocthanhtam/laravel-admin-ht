<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class ServiceCategory extends Model
{
    protected $table='service_categories';
    protected $fillable = [
        'id', 'name', 'content', 'service_id', 'image'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
