<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                // 一意である事をチェックするが、自分自身は除外している
                Rule::unique('members')->ignore($this->id), // ignore(除外対象)
            ],
            'mail' => [
                'required',
                // 一意である事をチェックするが、自分自身は除外している
                Rule::unique('members')->ignore($this->id), // ignore(除外対象)
            ],
            'age' => 'required',
            'gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nameは必須入力です',
            'name.unique' => '既に登録されています',
            'mail.required' => 'mailは必須入力です',
            'mail.unique' => '既に登録されています',
            'age.required' => 'ageは必須入力です',
            'gender.required' => 'genderは必須入力です',
        ];
    }
}
