<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'classification' => 'required',
            'priority' => 'required',
            'status' => 'required',
            'description' => 'required|string |max:255',
            'administrator' => 'required|string|max:40',
            'completion_date' => 'required|date',
        ];
    }

}
