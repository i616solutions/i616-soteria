<?php

namespace i616\Soteria\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemplateField extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'soteria_template_fields';

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
