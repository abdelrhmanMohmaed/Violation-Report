<?php

namespace App\Http\Requests\report;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidtionRequest extends FormRequest
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
        return [
            'seel' => 'required|string',
            'cat' => 'required|string',
            'areas' => 'required|string',
            'desc' => 'required|string',
            'action' => 'required|string',
            'target_date' => 'required|after:yesterday',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
            // 'receipt_confirmation' => 'required|string',
            'leader' => 'required|exists:Principals,id'
        ];
    }
}
