<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expenses';

    public $timestamps = true;
    protected $guarded = [];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expenses_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category',
        'type',
        'amount',
        'date'
    ];
}
