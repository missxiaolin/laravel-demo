<?php
namespace Huifang\Src\foundation\support\traits;

use Huifang\Src\foundation\support\Validation;

trait Validating
{
    /**
     * Validation object to be used.
     *
     * @var \Huifang\Src\foundation\support\Validation
     */
    protected $validation;

    /**
     * Get the validation object.
     *
     * @return \Huifang\Src\foundation\support\Validation
     */
    protected function getValidation()
    {
        if (!isset($this->validation)) {
            $this->validation = new Validation();
        }

        return $this->validation;
    }

}