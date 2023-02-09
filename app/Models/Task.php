<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }

    public static function task_sort(){
        // isfinished->updated_at
        return self::orderBy('isfinished', 'asc')
        ->orderBy('urgency', 'asc')
        ->orderBy('seriousness', 'asc')
        ->get();
    }
}
