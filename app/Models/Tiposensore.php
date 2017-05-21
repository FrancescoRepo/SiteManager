<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tiposensore
 * 
 * @property int $ID
 * @property string $Descrizione
 * 
 * @property \Illuminate\Database\Eloquent\Collection $sensores
 *
 * @package App\Models
 */
class Tiposensore extends Eloquent
{
	protected $table = 'tiposensore';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Descrizione'
	];

	public function sensores()
	{
		return $this->hasMany(\App\Models\Sensore::class, 'TipoSensoreID');
	}
}
