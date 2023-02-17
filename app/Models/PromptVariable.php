<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PromptVariable
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $prompt_id
 * @property-read \App\Models\Prompt|null $prompt
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable query()
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable wherePromptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PromptVariable withoutTrashed()
 * @mixin \Eloquent
 */
class PromptVariable extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'prompt_variables';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'key',
        'value',
        'prompt_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function prompt()
    {
        return $this->belongsTo(Prompt::class, 'prompt_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
