<?php

namespace App\Http\Requests\Member;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Database\Query\Builder;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->id === (int)$this->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'address_line_1' => ['string', 'max:255'],
            'address_line_2' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'state' => ['string', 'max:255'],
            'library_id' => ['integer', 'exists:libraries,id', Rule::unique('members')->where(fn (Builder $query) => $query->findUserId(Auth::user()->id))],
            'user_id' => ['integer', 'exists:users,id'],
        ];
    }
}
