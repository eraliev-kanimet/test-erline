<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Folder extends Model
{
    protected $fillable = [
        'folder_id',
        'name',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }
}
