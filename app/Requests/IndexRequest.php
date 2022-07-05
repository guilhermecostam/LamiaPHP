<?php

namespace App\Requests;

use App\Core\Request;

class IndexRequest extends Request
{
	public function validations(): array
	{
        return array_merge(
            parent::validate('lorem', [
                'required' => 'Field should be required',
                'isString' => 'Field should be string',
            ]),
            parent::validate('ipsum', [
                'isBoolean' => 'Field should be boolean',
            ]),
        );
	}
}
