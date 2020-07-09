<?php


namespace Shaden\Analytics\Models;


use Illuminate\Database\Eloquent\Model;

class Analytic  extends Model
{
    // Disable Laravel's mass assignment protection
    protected $guarded = [];
    protected $table = 'shaden_analytics';
    protected $casts = [
        'geo_data'=>'array',
    ]  ;
}
