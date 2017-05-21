<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gestione
 * 
 * @property string $UtenteCF
 * @property int $SitoID
 * 
 * @property \App\Models\Sito $sito
 * @property \App\Models\Utente $utente
 *
 * @package App\Models
 */
class Gestione extends Eloquent
{
	protected $table = 'gestione';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SitoID' => 'int'
	];

	public function sito()
	{
		return $this->belongsTo(\App\Models\Sito::class, 'SitoID');
	}

	public function utente()
	{
		return $this->belongsTo(\App\Models\Utente::class, 'UtenteCF');
	}
}
