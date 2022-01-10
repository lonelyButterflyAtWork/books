<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Isbn;
use Exception;

class BookRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'isbn' => trim($this->isbn, "-"),
        ]);

        if (is_numeric($this->isbn)){
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|required',
            'author_id' => 'required',
            'isbn' => 'required|string|min:13',
            'publisher_id' => 'required',
            'publication_year' => ' required|digits:4|integer|min:1000|max:' . (date('Y')),
        ];
    }
}
