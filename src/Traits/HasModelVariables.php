<?php

namespace Submtd\LaravelModelVariables\Traits;

use Submtd\LaravelModelVariables\Models\ModelVariable;
use Illuminate\Database\Eloquent\Builder;

trait HasModelVariables
{
    public static function bootHasModelVariables()
    {
        static::addGlobalScope('variables', function (Builder $builder) {
            $builder->with('variables');
        });
    }

    public function variables()
    {
        return $this->morphMany(ModelVariable::class, 'model');
    }

    public function getVariables()
    {
        if (!$this->exists) {
            return null;
        }
        $variables = [];
        foreach ($this->variables as $variable) {
            $variables[$variable->index] = $variable->value;
        }
        return $variables;
    }

    public function getVariable(string $index)
    {
        if (!$this->exists) {
            return null;
        }
        if (!$variable = $this->variables()->where('index', $index)->first()) {
            return null;
        }
        return $variable;
    }

    public function setVariable(string $index, string $value)
    {
        if (!$this->exists) {
            return null;
        }
        if (!$variable = $this->variables()->where('index', $index)->first()) {
            $variable = $this->variables()->create(['index' => $index]);
        }
        $variable->value = $value;
        $variable->save();
        return true;
    }

    public function deleteVariable(string $index)
    {
        if (!$this->exists) {
            return null;
        }
        $this->variables()->where('index', $index)->delete();
        return true;
    }
}
