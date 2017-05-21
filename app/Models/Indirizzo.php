<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Indirizzo
 * 
 * @property int $ID
 * @property string $Nazione
 * @property string $Provincia
 * @property string $Citta
 * @property string $Via
 * @property string $Civico
 * @property string $CAP
 * @property string $ClientePI
 * 
 * @property \App\Models\Cliente $cliente
 * @property \Illuminate\Database\Eloquent\Collection $sitos
 *
 * @package App\Models
 */
class Indirizzo extends Eloquent
{
	protected $table = 'indirizzo';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Nazione',
		'Provincia',
		'Citta',
		'Via',
		'Civico',
		'CAP',
		'ClientePI'
	];

	public function cliente()
	{
		return $this->belongsTo(\App\Models\Cliente::class, 'ClientePI');
	}

	public function sitos()
	{
		return $this->hasMany(\App\Models\Sito::class, 'IndirizzoID');
	}
}
