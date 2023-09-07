<?php

namespace App\Kernel\Validator;

class Validator
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $key => $rule) {
            $rules = $rule;

            foreach ($rules as $rule) {
                $rule = explode(':', $rule);

                if ($rule[0] === 'required' && empty($data[$key])) {
                    $this->errors[$key] = "The $key field is required.";
                }

                if ($rule[0] === 'min' && strlen($data[$key]) < $rule[1]) {
                    $this->errors[$key] = "The $key field must be at least $rule[1] characters.";
                }

                if ($rule[0] === 'max' && strlen($data[$key]) > $rule[1]) {
                    $this->errors[$key] = "The $key field must be less than $rule[1] characters.";
                }

                if ($rule[0] === 'email' && ! filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$key] = "The $key field must be a valid email address.";
                }
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
