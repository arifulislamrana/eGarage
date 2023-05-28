<?php

namespace App\Utility;

use Exception;

interface ILogger
{
    public function write($level, $message, ?Exception $exceptionObject);
}

?>
