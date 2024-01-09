<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasFile;
    protected $guarded = [];

    protected $casts = [
        'choose_mvp' => 'boolean',
    ];

    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|in:started,not_started,stopped',
            'category' => 'required|in:one,two,three',
            'details' => 'required|string',
            'steps' => 'required|string',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after_or_equal:starting_date',
            'administrator' => 'required|string|max:255',
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
