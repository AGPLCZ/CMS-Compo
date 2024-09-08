<?php
namespace Compo\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents'; // Odpovídá názvu tabulky
    protected $primaryKey = 'contents_id'; // Pokud používáš vlastní primární klíč
    public $timestamps = false; // Pokud tabulka nemá sloupce `created_at` a `updated_at`

    // Definice vztahu k lokalizacím obsahu
    public function localizations()
    {
        return $this->hasMany(ContentLocalization::class, 'contents_id', 'contents_id');
    }
}
