<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createProjectRequest extends FormRequest
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
            'project_code' => 'required',
            'project_name' => 'required|max:255',
            'user_id' => 'required',
            'sales_in_charge' => 'required',
            'order_amount' => 'required',
            'order_date' => 'required',
            'status' => 'required'
        ];
    }
}
