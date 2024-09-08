<?php
namespace Compo\Models;

use Illuminate\Database\Eloquent\Model;

class ContentLocalization extends Model
{
    protected $table = 'content_localizations'; // Odpovídá názvu tabulky
    protected $primaryKey = 'localization_id'; // Pokud máš primární klíč s jiným názvem (pokud ne, uprav)
    public $timestamps = false; // Pokud tabulka nemá sloupce `created_at` a `updated_at`

    // Definice vztahu k obsahu
    public function content()
    {
        return $this->belongsTo(Content::class, 'contents_id', 'contents_id');
    }
}
