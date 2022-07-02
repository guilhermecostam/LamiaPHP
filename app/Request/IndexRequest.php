<?php

namespace App\Request;

use App\Core\Request;

class IndexRequest extends Request
{
	public function validations(): array
	{
        return array_merge(
            parent::validate($_GET['lorem'], [
                'required' => 'Field should be required',
                'isString' => 'Field should be string',
            ]),
            parent::validate($_GET['ipsum'], [
                'isBoolean' => 'Field should be boolean',
            ]),
        );
	}
}
