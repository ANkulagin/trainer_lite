<?php

namespace App\Kernel\Validator;

class Validator
{
    private array $errors = [];
    private array $data;

    public function validate(array $data, array $rules): bool
    {
        $this->data = $data;
        $this->errors = [];

        foreach ($rules as $key => $rule) {
            $ruleArray = explode('|', $rule);
            foreach ($ruleArray as $subRule) {

                $ruleParts = explode(':', $subRule);
                $ruleName = $ruleParts[0];
                $ruleValue = $ruleParts[1] ?? null;
                $error = $this->validateRule($key, $ruleName, $ruleValue);
                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }

        return empty($this->errors);
    }
    public function errors():array
    {
        return $this->errors;
    }
    private function validateRule(string $key, string $ruleName, string $ruleValue = null):string|false
    {
        $value = $this->data[$key];
        switch ($ruleName) {
            case 'required':
                if (!$value) {
                    return 'Field'.$key.' is required';
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                    return "Field $key must be at least $ruleValue characters";
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                    return "Field '.$key.'must be at most $ruleValue characters";
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return "Field $key must be a valid email address";
                }
                break;
            case 'unique':
                $model = new $ruleValue;
                if ($model->where($key, $value)->first()) {
                    return "Field  $key must be unique";
                }
                break;
        }
        return false;
    }
}