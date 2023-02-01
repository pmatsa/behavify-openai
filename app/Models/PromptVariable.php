<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
