<?php

namespace i616\Soteria\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payload extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'soteria_payloads';

    public function vault()
    {
        return $this->belongsTo(Vault::class);
    }
}
