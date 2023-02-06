<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReportRequest extends FormRequest
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
            'seel_id' => 'required|exists:seels,id',
            'category_id' => 'required|exists:categories,id',
            'area_id' => 'required|exists:areas,id',
            'description' => 'required|string',
            'recommended_action' => 'required|string',
            'target_Date' => 'required|after:yesterday',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
            'principal_id' => 'required|exists:Principals,id',
        ];
    }
}
