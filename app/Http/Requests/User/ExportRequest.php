<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo(env('MIX_PERM_MANAGE_USERS', 'NO_PERM'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'export' => 'required|in:Xlsx,Csv,Xls,Html',
        ];
    }
}
