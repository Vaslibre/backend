<?php

namespace App\Traits;

use Jenssegers\Date\Date;

/**
 * Trait para traducir las fechas de los modelos
 * (no es nada fancy pero hace el trabajo xD )
 */
trait DateTranslator
{
    
    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return new Date($date);
    }
}
