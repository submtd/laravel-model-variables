<?php

namespace Submtd\LaravelModelVariables\Traits;

use Submtd\LaravelModelVariables\Models\ModelVariable;

trait HasModelVariables
{
    public function variables()
    {
        return $this->hasMany(ModelVariable::class, 'model');
    }

    public function getVariable(string $index)
    {
        if (!$variable = $this->variables()->where('index', $index)->first()) {
            return null;
        }
        return $variable->value;
    }

    public function setVariable(string $index, string $value)
    {
        if (!$variable = $this->variables()->where('index', $index)->first()) {
            $variable = $this->variables()->create(['index' => $index]);
        }
        $variable->value = $value;
        $variable->save();
        return true;
    }
}
