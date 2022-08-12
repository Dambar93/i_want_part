<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class PartIsOutOfStock extends Exception
{
    public function report()
    {
        Log::debug('Part is out of stock');
    }
}
