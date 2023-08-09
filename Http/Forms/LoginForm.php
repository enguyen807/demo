<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attr)
    {
        if (!Validator::email($attr['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attr['password'])) {
            $this->errors['password'] = 'Please provide a valid password  .';
        }
    }

    public static function validate($attr)
    {
        $instance = new static($attr);

        return $instance->hasErrors() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attr);
    }

    public function hasErrors()
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setError($field, $msg)
    {
        $this->errors[$field] = $msg;
        return $this;
    }
}
