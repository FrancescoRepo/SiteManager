<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Errore
 * 
 * @property int $ID
 * @property string $Descrizione
 * 
 * @property \Illuminate\Database\Eloquent\Collection $rilevaziones
 *
 * @package App\Models
 */
class Errore extends Eloquent
{
	protected $table = 'errore';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Descrizione'
	];

	public function rilevaziones()
	{
		return $this->hasMany(\App\Models\Rilevazione::class, 'ErroreID');
	}
}
