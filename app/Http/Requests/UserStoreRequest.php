<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		/* https://laracasts.com/discuss/channels/laravel/forcing-a-unique-rule-to-ignore-a-given-id?reply=597962
		Rule::unique('users', 'email')
					->where(static function ($query) {
						return $query->whereNull('deleted_at');
					})
					->ignore($this->user),
		*/
		return [
			'name'						=>	['required', 'min:4', 'max:255'],
			'email'						=>	['required', 'min:4', 'max:255', 'email', Rule::unique('users', 'email')->ignore($this->user),],
			'password'					=>	['required', 'min:8', 'max:50'],
			'role'						=>	['required', 'min:1', 'array'],
		];
	}
}
