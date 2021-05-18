<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	use HasFactory;

	//TODO: REMOVER ESSA LINHA ABAIXO E CORRIGIR A TABELA PARA PLURAL
	protected $table = 'role_user';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'role_id',
		'user_id'
	];

	
	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
	
	
	public function role()
	{
		return $this->belongsTo('App\Models\Role', 'user_id', 'id');
	}
	
}