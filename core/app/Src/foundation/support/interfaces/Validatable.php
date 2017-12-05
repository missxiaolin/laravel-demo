<?php namespace Huifang\Src\foundation\support\interfaces;

interface Validatable
{
    /**
     * Validate this object (either entity or value object).
     *
     * @return \Huifang\Src\foundation\support\interfaces\Validation
     */
    public function validate();

}