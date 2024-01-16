<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function rules()
    {
        return [
            'name' => 'required|max:200',
            'owner' => 'required|max:200',
            'priority' => 'required',
            'details' => 'required',
            'requirements' => 'required',
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
