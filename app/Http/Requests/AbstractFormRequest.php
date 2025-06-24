<?php
namespace App\Http\Requests;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

abstract class AbstractFormRequest extends FormRequest
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
     * Handle failed validation and provide localized error messages.
     */
    protected function failedValidation(ValidatorContract $validator)
    {

        $validationMessages = [];

        $validatorInstance = Validator::make($this->all(), $this->rules());

        try {
            $validatorInstance->validate();
        } catch (ValidationException $e) {
            $validationMessages = collect($e->errors())->first();
        }



        throw new HttpResponseException(
            response()->json(['messages' => $validationMessages], 422)
        );


    }
}
