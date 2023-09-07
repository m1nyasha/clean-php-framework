<?php

namespace App\Kernel\Validator;

class Validator
{
    private array $errors = [];

    public function __construct(
        private readonly array $data,
        private readonly array $rules,
    ) {
    }

    public function validate(): bool
    {
        $this->errors = [];

        foreach ($this->rules as $key => $rule) {
            $rules = $rule;

            foreach ($rules as $rule) {
                $rule = explode(':', $rule);

                if ($rule[0] === 'required' && empty($this->data[$key])) {
                    $errors[$key] = "The $key field is required.";
                }

                if ($rule[0] === 'min' && strlen($this->data[$key]) < $rule[1]) {
                    $errors[$key] = "The $key field must be at least $rule[1] characters.";
                }

                if ($rule[0] === 'max' && strlen($this->data[$key]) > $rule[1]) {
                    $errors[$key] = "The $key field must be less than $rule[1] characters.";
                }

                if ($rule[0] === 'email' && ! filter_var($this->data[$key], FILTER_VALIDATE_EMAIL)) {
                    $errors[$key] = "The $key field must be a valid email address.";
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
