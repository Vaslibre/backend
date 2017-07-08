<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Jul 2017 22:13:07 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Evento
 * 
 * @property int $id
 * @property string $nombre
 * @property int $fecha
 * @property int $activo
 *
 * @package App
 */
class Evento extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'fecha',
		'activo'
	];
}
