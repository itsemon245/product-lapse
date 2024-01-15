<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Change extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function rules()
    {
        return [
            'title' => 'required|string',
            'classification' => 'required',
            'priority' => 'required',
            'status' => 'required',
            'details' => 'required',
            'administrator' => 'required',
            'required_completion_date' => 'required|date',
        ];
    }
}
