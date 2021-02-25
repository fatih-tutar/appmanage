<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:200',
            'description' => 'required',
            'started_at' => 'after:'.now(),
            'finished_at' => 'after:'.now(),
        ];
    }

    public function attributes(){
        return [
            'title' => 'Kampanya Adı',
            'description' => 'Kampanya Açıklaması',
            'started_at' => 'Başlangıç',
            'finished_at' => 'Bitiş',
        ];
    }
}
