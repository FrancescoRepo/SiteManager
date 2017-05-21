<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rilevazione
 * 
 * @property int $ID
 * @property int $SensoreID
 * @property \Carbon\Carbon $Data
 * @property int $ValoreRilevazione int
 * @property int $ErroreID
 * @property string $Descrizione
 * 
 * @property \App\Models\Sensore $sensore
 * @property \App\Models\Errore $errore
 *
 * @package App\Models
 */
class Rilevazione extends Eloquent
{
	protected $table = 'rilevazione';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'SensoreID' => 'int',
		'ValoreRilevazione int' => 'int',
		'ErroreID' => 'int'
	];

	protected $dates = [
		'Data'
	];

	protected $fillable = [
		'SensoreID',
		'Data',
		'ValoreRilevazione int',
		'ErroreID',
		'Descrizione'
	];

	public function sensore()
	{
		return $this->belongsTo(\App\Models\Sensore::class, 'SensoreID');
	}

	public function errore()
	{
		return $this->belongsTo(\App\Models\Errore::class, 'ErroreID');
	}
}
