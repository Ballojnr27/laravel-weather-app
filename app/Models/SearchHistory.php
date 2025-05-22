<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $table = 'search_history';

    protected $fillable = ['user_id','location', 'country', 'weather_data', 'searched_at'];

    // Cast weather_data to an array
    protected $casts = [
        'weather_data' => 'array',
    ];
}
