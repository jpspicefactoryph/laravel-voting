<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(){
        $this->merge([
            'user_id' => Auth::id(),
            'starts_at' => Carbon::parse($this->starts_at)->toDateString(),
            'ends_at' => Carbon::parse($this->ends_at)->toDateString(),
        ]);

        // dd($this->all());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'starts_at' => 'required|date|after:today',
            'ends_at' => 'required|date|after:start_date',
            'questions' => 'required|array|min:1',
            'questions.*.content' => 'required|max:255',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*.content' => 'required|max:255',
        ];
    }
}
