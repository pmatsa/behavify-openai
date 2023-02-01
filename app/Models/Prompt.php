<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
