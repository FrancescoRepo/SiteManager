<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sito
 * 
 * @property int $ID
 * @property string $Nome
 * @property string $Descrizione
 * @property int $IndirizzoID
 * @property bool $TrasferimentoAbilitato
 * 
 * @property \App\Models\Indirizzo $indirizzo
 * @property \Illuminate\Database\Eloquent\Collection $gestiones
 * @property \Illuminate\Database\Eloquent\Collection $sensores
 *
 * @package App\Models
 */
class Sito extends Eloquent
{
	protected $table = 'sito';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IndirizzoID' => 'int',
		'TrasferimentoAbilitato' => 'bool'
	];

	protected $fillable = [
		'Nome',
		'Descrizione',
		'IndirizzoID',
		'TrasferimentoAbilitato'
	];

	public function indirizzo()
	{
		return $this->belongsTo(\App\Models\Indirizzo::class, 'IndirizzoID');
	}

	public function gestiones()
	{
		return $this->hasMany(\App\Models\Gestione::class, 'SitoID');
	}

	public function sensores()
	{
		return $this->hasMany(\App\Models\Sensore::class, 'SitoID');
	}
}
