<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tipoutente
 * 
 * @property int $ID
 * @property string $Descrizione
 * 
 * @property \Illuminate\Database\Eloquent\Collection $utentes
 *
 * @package App\Models
 */
class Tipoutente extends Eloquent
{
	protected $table = 'tipoutente';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Descrizione'
	];

	public function utentes()
	{
		return $this->hasMany(\App\Models\Utente::class, 'TipoID');
	}
}
