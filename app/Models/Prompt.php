<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Prompt
 *
 * @property int $id
 * @property string $prompt_request
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property array|null $variables
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PromptVariable> $promptPromptVariables
 * @property-read int|null $prompt_prompt_variables_count
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt wherePromptRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt whereVariables($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Prompt withoutTrashed()
 * @mixin \Eloquent
 */
class Prompt extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'prompts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'prompt_request',
        'title',
        'variables',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'variables' => 'json',
    ];

    public function promptPromptVariables()
    {
        return $this->hasMany(PromptVariable::class, 'prompt_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
