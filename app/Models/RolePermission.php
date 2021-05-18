<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
	use HasFactory;

	//TODO: REMOVER ESSA LINHA ABAIXO E CORRIGIR A TABELA PARA ROLE_PERMISSIONS
	protected $table = 'permission_role';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'role_id',
		'permission_id'
	];



}
