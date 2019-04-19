<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Contact;

class ContactRequest extends FormRequest
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
      

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'number' => 'required|numeric|unique:contacts,number,NULL,id,deleted_at,NULL',
                    'name' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    
                    'number' => 'required|numeric|unique:contacts,number,'.$this->get('id').',id,deleted_at,NULL',
                    'name' => 'required',
                ];
            }
            default:break;
        }
    }
   
}