<?php

namespace Core\Validator;

class Validator
{
    protected array $data;
    protected array $errors = [];

    /**
     * Validate the given data against the rules.
     *
     * @param array $data
     * @param array $rules
     * @return bool
     */
    public function validate(array $data, array $rules): bool
    {
        $this->data = $data;
        $this->errors = [];

        foreach ($rules as $field => $fieldRules) {
            $rulesArray = is_array($fieldRules) ? $fieldRules : explode('|', $fieldRules);

            foreach ($rulesArray as $rule) {
                $params = [];
                if (str_contains($rule, ':')) {
                    [$rule, $paramString] = explode(':', $rule);
                    $params = explode(',', $paramString);
                }

                $methodName = 'validate' . ucfirst($rule);

                if (method_exists($this, $methodName)) {
                    $value = $this->data[$field] ?? null;
                    if (!$this->$methodName($field, $value, $params)) {
                        // If one rule fails, we stop for this field by default or continue? 
                        // Let's continue to get all errors.
                    }
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * Check if validation failed.
     *
     * @return bool
     */
    public function fails(): bool
    {
        return !empty($this->errors);
    }

    /**
     * Get validation errors.
     *
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * Add an error message.
     *
     * @param string $field
     * @param string $message
     */
    protected function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
        add_error($field, $message);
    }

    // --- Validation Rules ---

    protected function validateRequired(string $field, $value): bool
    {
        if ($value === null || (is_string($value) && trim($value) === '') || (is_array($value) && empty($value))) {
            $this->addError($field, "The {$field} field is required.");
            return false;
        }
        return true;
    }

    protected function validateEmail(string $field, $value): bool
    {
        if (empty($value))
            return true; // Let 'required' handle empty

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, "The {$field} must be a valid email address.");
            return false;
        }
        return true;
    }

    protected function validateMin(string $field, $value, array $params): bool
    {
        if (empty($value))
            return true;

        $min = (int) ($params[0] ?? 0);

        if (is_string($value) && strlen($value) < $min) {
            $this->addError($field, "The {$field} must be at least {$min} characters.");
            return false;
        }

        if (is_numeric($value) && $value < $min) {
            $this->addError($field, "The {$field} must be at least {$min}.");
            return false;
        }

        return true;
    }

    protected function validateMax(string $field, $value, array $params): bool
    {
        if (empty($value))
            return true;

        $max = (int) ($params[0] ?? 0);

        if (is_string($value) && strlen($value) > $max) {
            $this->addError($field, "The {$field} may not be greater than {$max} characters.");
            return false;
        }

        if (is_numeric($value) && $value > $max) {
            $this->addError($field, "The {$field} may not be greater than {$max}.");
            return false;
        }

        return true;
    }

    protected function validateNumeric(string $field, $value): bool
    {
        if (empty($value))
            return true;

        if (!is_numeric($value)) {
            $this->addError($field, "The {$field} must be a number.");
            return false;
        }
        return true;
    }

    protected function validateAlpha(string $field, $value): bool
    {
        if (empty($value))
            return true;

        if (!preg_match('/^[\pL\pM]+$/u', $value)) {
            $this->addError($field, "The {$field} must only contain letters.");
            return false;
        }
        return true;
    }

    protected function validateRegex(string $field, $value, array $params): bool
    {
        if (empty($value))
            return true;

        $pattern = $params[0] ?? '';
        if (!preg_match($pattern, $value)) {
            $this->addError($field, "The {$field} format is invalid.");
            return false;
        }
        return true;
    }

    protected function validateUrl(string $field, $value): bool
    {
        if (empty($value))
            return true;

        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            $this->addError($field, "The {$field} must be a valid URL.");
            return false;
        }
        return true;
    }
}
