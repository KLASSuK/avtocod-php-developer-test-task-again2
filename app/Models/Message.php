<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

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
 * @method static Builder create(array $attributes = [])
 */
class Message extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'body',
        'id_owner',
    ];

    /** Make_shure_id_owner = integer bcz have problem with button delete when check type and value of id and id_owner
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
