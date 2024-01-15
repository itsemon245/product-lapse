<?php

namespace App\Models;

use App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    use HasFile;
    protected $guarded = [];

    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required',
            'version' => 'required',
            'description' => 'required|string|max:255',
            'date' => 'required',
            'attach_file' => 'required',
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
