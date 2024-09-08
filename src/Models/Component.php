<?php
namespace Compo\Models;

use Illuminate\Database\Eloquent\Model;


class Component extends Model
{
    protected $table = 'components';
    protected $primaryKey = 'components_id'; // Pokud tvá tabulka používá custom primary key
    public $timestamps = false; // Pokud tabulka nemá `created_at` a `updated_at`
}
