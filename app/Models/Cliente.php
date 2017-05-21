<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cliente
 * 
 * @property string $PI
 * @property string $RagioneSociale
 * 
 * @property \Illuminate\Database\Eloquent\Collection $indirizzos
 * @property \Illuminate\Database\Eloquent\Collection $utentes
 *
 * @package App\Models
 */
class Cliente extends Eloquent
{
	protected $table = 'cliente';
	protected $primaryKey = 'PI';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'RagioneSociale'
	];

	public function indirizzos()
	{
		return $this->hasMany(\App\Models\Indirizzo::class, 'ClientePI');
	}

	public function utentes()
	{
		return $this->hasMany(\App\Models\Utente::class, 'ClientePI');
	}
}
