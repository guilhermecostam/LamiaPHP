<?php

namespace App\Core;

class Validator
{
	public function required(mixed $value): bool
	{
        return !empty($value);
	}

	public function isArray(mixed $value): bool
	{
        return is_array($value);
	}

	public function isString(mixed $value): bool
	{
		return is_string($value);
	}

	public function isInteger(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_INT);
	}

	public function isFloat(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_FLOAT);
	}

	public function isBoolean(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_BOOL);
	}

	public function isEmail(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}

	public function isUrl(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_URL);
	}

	public function isValidDate(mixed $value):bool
	{
		$dateArray = explode('/', $value);
		
		return checkdate($dateArray[1], $dateArray[0], $dateArray[2]);
	}
}
