<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 May 2017 10:23:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Utente
 * 
 * @property string $CF
 * @property string $Nome
 * @property string $Cognome
 * @property string $Sesso
 * @property \Carbon\Carbon $DataNascita
 * @property string $Username
 * @property string $Password
 * @property bool $PrimoLogin
 * @property string $Email
 * @property string $Telefono
 * @property int $TipoID
 * @property string $ClientePI
 * 
 * @property \App\Models\Tipoutente $tipoutente
 * @property \App\Models\Cliente $cliente
 * @property \Illuminate\Database\Eloquent\Collection $gestiones
 *
 * @package App\Models
 */
class Utente extends Eloquent
{
	protected $table = 'utente';
	protected $primaryKey = 'CF';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PrimoLogin' => 'bool',
		'TipoID' => 'int'
	];

	protected $dates = [
		'DataNascita'
	];

	protected $fillable = [
		'Nome',
		'Cognome',
		'Sesso',
		'DataNascita',
		'Username',
		'Password',
		'PrimoLogin',
		'Email',
		'Telefono',
		'TipoID',
		'ClientePI'
	];

	public function tipoutente()
	{
		return $this->belongsTo(\App\Models\Tipoutente::class, 'TipoID');
	}

	public function cliente()
	{
		return $this->belongsTo(\App\Models\Cliente::class, 'ClientePI');
	}

	public function gestiones()
	{
		return $this->hasMany(\App\Models\Gestione::class, 'UtenteCF');
	}
}
