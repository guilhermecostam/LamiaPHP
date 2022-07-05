<?php

namespace App\Core;

use App\Core\Validator;

abstract class Request
{
    private Validator $validator;
    protected array $messages;

    public function __construct()
	{
		$this->validator = new Validator();
	}

    protected function validate(string $field, array $validations): array
    {
        $this->messages = [];
        foreach ($validations as $validation => $message) {
            if (method_exists(Validator::class, $validation)) {
                if(!$this->checkValidation($_POST[$field], $validation)){
                    $this->messages[] = $message;
                }
            }
        }

        return $this->messages;
    }

    protected function checkValidation(mixed $value, string $validation): bool
    {
        return $this->validator->$validation($value);
    }

    abstract public function validations(): array;
}