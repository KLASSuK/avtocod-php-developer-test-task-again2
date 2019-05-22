<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Message model.
 *
 * @property int    id
 * @property string body
 * @property int    id_owner
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property User   $user
 *
 * @method static QueryBuilder orderBy($column, $direction = 'asc')
 * @method static Builder findOrFail($id, $columns = ['*'])
 */
class Message extends Model
{
    public const A1_CONST = 'asdsad';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'title',
        'body',
        'id_owner',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'id_owner' => 'integer',
    ];

    /**
     * User of current message.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_owner', 'id');
    }
}
