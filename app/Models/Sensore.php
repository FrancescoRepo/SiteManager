<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sensore
 * 
 * @property int $ID
 * @property int $SitoID
 * @property int $MarcaID
 * @property string $Modello
 * @property int $TipoSensoreID
 * @property float $Latitudine
 * @property float $Longitudite
 * @property int $ValoreMassimo
 * @property int $ValoreMinimo
 * 
 * @property \App\Models\Sito $sito
 * @property \App\Models\Tiposensore $tiposensore
 * @property \App\Models\Marca $marca
 * @property \Illuminate\Database\Eloquent\Collection $rilevaziones
 *
 * @package App\Models
 */
class Sensore extends Eloquent
{
	protected $table = 'sensore';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'SitoID' => 'int',
		'MarcaID' => 'int',
		'TipoSensoreID' => 'int',
		'Latitudine' => 'float',
		'Longitudite' => 'float',
		'ValoreMassimo' => 'int',
		'ValoreMinimo' => 'int'
	];

	protected $fillable = [
		'SitoID',
		'MarcaID',
		'Modello',
		'TipoSensoreID',
		'Latitudine',
		'Longitudite',
		'ValoreMassimo',
		'ValoreMinimo'
	];

	public function sito()
	{
		return $this->belongsTo(\App\Models\Sito::class, 'SitoID');
	}

	public function tiposensore()
	{
		return $this->belongsTo(\App\Models\Tiposensore::class, 'TipoSensoreID');
	}

	public function marca()
	{
		return $this->belongsTo(\App\Models\Marca::class, 'MarcaID');
	}

	public function rilevaziones()
	{
		return $this->hasMany(\App\Models\Rilevazione::class, 'SensoreID');
	}
}
