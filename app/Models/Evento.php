<?php

namespace App\Models;

use App\Traits\AppTrait;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	use AppTrait;

	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'fecha',
		'activo'
	];
}
