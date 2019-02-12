<?php

namespace Submtd\LaravelModelVariables\Models;

use Illuminate\Database\Eloquent\Model;

class ModelVariable extends Model
{
    protected $fillable = [
        'index',
        'value',
    ];

    protected $hidden = [
        'id',
        'model_type',
        'model_id',
        'created_at',
        'updated_at',
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function toArray()
    {
        return [$this->index => $this->value];
    }
}
