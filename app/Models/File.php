<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class File extends Model
{
    protected $fillable = [
        'folder_id',
        'uuid',
        'name',
        'path',
        'size',
        'is_public',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        self::created(function (self $file) {
            $file->uuid = Str::uuid();
        });
    }
}
