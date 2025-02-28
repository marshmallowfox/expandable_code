<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @mixin Builder
 * @mixin \Illuminate\Contracts\Database\Eloquent\Builder
 */
class Code extends Model
{
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = [
        'code',
        'user_id'
    ];
}
