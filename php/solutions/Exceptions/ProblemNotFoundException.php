<?php

namespace Solutions\Exceptions;

class ProblemNotFoundException extends \Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "Problem $message Not Found.\n";
    }
}
