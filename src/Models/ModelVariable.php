<?php

namespace Submtd\LaravelModelVariables\Models;

use Illuminate\Database\Eloquent\Model;

class ModelVariable extends Model
{
    protected $fillable = [
        'index',
        'value',
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
