<?php

namespace Solutions\Exceptions;

class QuestionAlreadyExistException extends \Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "Question file $message is Already Exist.\n";
    }
}
