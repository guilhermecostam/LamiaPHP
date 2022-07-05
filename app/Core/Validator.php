<?php

namespace App\Core;

class Validator
{
	/**
     * Method that validate if value is empty.
     *
	 * @param mixed $value
     * @return bool
     */
	public function required(mixed $value): bool
	{
        return !empty($value);
	}

	/**
     * Method that validate if value is an array.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isArray(mixed $value): bool
	{
        return is_array($value);
	}

	/**
     * Method that validate if value is an string.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isString(mixed $value): bool
	{
		return is_string($value);
	}

	/**
     * Method that validate if value is an integer.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isInteger(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_INT);
	}

	/**
     * Method that validate if value is an float.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isFloat(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_FLOAT);
	}

	/**
     * Method that validate if value is an boolean.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isBoolean(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_BOOL);
	}

	/**
     * Method that validate if value is an email.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isEmail(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}

	/**
     * Method that validate if value is an url.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isUrl(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_URL);
	}

	/**
     * Method that validate if value is a valid date.
     *
	 * @param mixed $value
     * @return bool
     */
	public function isValidDate(mixed $value):bool
	{
		$dateArray = explode('/', $value);
		
		return checkdate($dateArray[1], $dateArray[0], $dateArray[2]);
	}
}
