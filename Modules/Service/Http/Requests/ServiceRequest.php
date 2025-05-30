<?php

namespace Modules\Service\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id');
        $type = session('type');
        switch (strtolower($this->getMethod())) {
            case 'post':
                return [
                    'name' => [
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('services', 'name')->where(function ($query) use ($type) {
                            // Add your condition based on the session value for service_type
                            return $query->where('type', $type);
                        }),
                    ],
                    //'duration_min' => 'required|integer',
                    'category_id' => 'required|integer',
                    'default_price' => 'required|numeric|min:0',
                    'status' => 'boolean',
                ];
                break;
            case 'put':
            case 'patch':
                return [
                    'name' => [
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('services', 'name')->where(function ($query) use ($type) {
                            return $query->where('type', $type);
                        })->whereNotIn('id', [$id]),
                    ],
                    'duration_min' => 'required|integer',
                    'category_id' => 'required|integer',
                    'default_price' => 'required|numeric|min:0',
                    'status' => 'boolean',
                ];
                break;
        }

        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $data = [
            'status' => false,
            'message' => $validator->errors()->first(),
            'all_message' => $validator->errors(),
        ];

        if (request()->wantsJson() || request()->is('api/*')) {
            throw new HttpResponseException(response()->json($data, 422));
        }

        throw new HttpResponseException(redirect()->back()->withInput()->with('errors', $validator->errors()));
    }
}
