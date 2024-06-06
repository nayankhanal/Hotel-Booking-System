<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
    {dd('hello');
        return [
            'first_name'=>['required','string','max:20','min:2'],
            'last_name'=>['required','string','max:20','min:2'],
            'email_address'=>['required','email',],
            'phone_number'=>[],
            'num_children'=>[],
            'num_adults'=>[],
            'room_id'=>[],
            'addon_id'=>[],
            'checkin_date'=>[],
            'checkout_date'=>[],
            'payment_status'=>[],
            'booking_amount'=>[],
        ];
    }
}
