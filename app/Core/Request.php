<?php

namespace App\Core;

use App\Core\Validator;

abstract class Request
{
    /**
     * The Validator instance.
     *
     * @var Validator
     */
    private Validator $validator;

    /**
     * The messages for failed validations.
     *
     * @var array
     */
    protected array $messages;

    /**
     * Create a new Validator instance.
     */
    public function __construct()
	{
		$this->validator = new Validator();
	}

    /**
     * Method that validate requested post fields.
     *
	 * @param string $field
	 * @param array $validations
     * @return array $messages
     */
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

    /**
     * Method that checks if the field passes a certain validation.
     *
	 * @param mixed $value
	 * @param string $validation
     * @return bool
     */
    protected function checkValidation(mixed $value, string $validation): bool
    {
        return $this->validator->$validation($value);
    }

    /**
     * Method that merge and returns messages for failed validations.
     *
     * @return array
     */
    abstract public function validations(): array;
}