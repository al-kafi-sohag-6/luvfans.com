<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\RestrictedWord;

class RestrictedWordRule implements Rule
{

    protected $type;

    /**
     * Create a new rule instance.
     *
     * @return void
     */


    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //

        $restrictedWords = RestrictedWord::where('type', $this->type)->pluck('word')->toArray();
        foreach ($restrictedWords as $restrictedWord) {
            if (stripos($value, $restrictedWord) !== false) {
                $this->failedWord = $restrictedWord;
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.restricted_word', ['word' => $this->failedWord]);
    }
}
