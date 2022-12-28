<?php

namespace i616\Soteria\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'soteria_templates';

    public function fields()
    {
        return $this->hasMany(TemplateField::class);
    }
}
