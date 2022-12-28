<?php

namespace i616\Soteria\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secret extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'soteria_secrets';

    public function vault()
    {
        return $this->belongsTo(Vault::class);
    }

    public function payload()
    {
        return $this->hasOne(Payload::class);
    }

    public function template()
    {
        return $this->hasOne(Template::class);
    }
}
