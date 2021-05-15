<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TertiaryComment extends Model
{
    use HasFactory;

    /**
     * The protected attributes
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $casts = [
        'id'               => 'integer',
        'user_name'        => 'string',
        'secondary_comment_id' => 'integer',
        'body'             => 'string',
    ];

    public function comment(): BelongsTo
    {
        return $this->belongsTo(SecondaryComment::class);
    }
}
