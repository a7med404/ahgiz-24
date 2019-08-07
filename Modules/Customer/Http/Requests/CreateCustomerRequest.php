<?php

namespace Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Customer\Entities\Customer;
use Illuminate\Validation\Rule;

class CreateCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Customer $customer)
    {
        return [
            'first_name'    => 'required|string|max:100|min:2', 
            'last_name'     => 'required|string|max: 100|min: 2', 
            // 'phone_number' => 'required|unique:customers,phone_number|string|max:14|min:10',Rule::unique('customers')->ignore($customer->id), #not work
            'phone_number'  => 'required|unique:customers,phone_number|string|max:14|min:10',Rule::unique('customers')->ignore($customer->id), #not work
            'email'         => 'nullable|string|email|max:255',
            'password'      => 'required|string|min:6',
            'gender'        => 'nullable|boolean', 
            'brithdate'     => 'nullable|date',
        ];
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
}
