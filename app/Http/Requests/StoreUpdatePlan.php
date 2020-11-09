<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StoreUpdatePlan extends FormRequest
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
        // Segment é a posição do parametro na url ex: http://localhost:8000/admin/plans/Plano XXX/edit
        //  para localizar a posição                                           1     2     3
        $url = $this->segment(3);
        return [
            'name' => "required|min:3|max:191|unique:plans,name,{$url},url",
            'description' => 'nullable|min:3|max:191',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
