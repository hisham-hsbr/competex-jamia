<?php

namespace App\Http\Requests\TestDemo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;

class StoreAndUpdateTestDemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // return [
        //     'code' => 'required|unique:test_demos,code',
        //     'name' => 'required',
        // ];


        $id = $this->route('id') ? Crypt::decrypt($this->route('id')) : null; // Get the ID from the route if it's an update

        return [
            'code' => $id ? "required|unique:test_demos,code,$id" : 'required|unique:test_demos,code',
            'name' => 'required',
            'default' => ['nullable', 'boolean'],
            'status' => ['required_if:default,1', 'boolean'],
        ];
    }
    public function message()
    {
        return [
            'code.required' => 'Code required',
            'code.unique' => 'Code unique',
            'name.required' => 'Name required',
            'status.required_if' => 'The status must be active when default is selected.',
        ];
    }
}
