<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestrictedWord extends Model
{
    use HasFactory;

    protected $fillable = ['word', 'type'];

    public static function getRestrictedWordsByType($type)
    {
        return static::where('type', $type)->pluck('word')->toArray();
    }
}
