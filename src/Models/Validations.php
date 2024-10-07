<?php
namespace App\Models;

enum Validations {
    case FIO;
    case PHONE;

    public function values() {
        return match($this) {
            self::FIO => new ValidationParam("fio", "", "", true, "", ""),
            self::PHONE => new ValidationParam("phone", "^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$", "~\D+~", true, "11", "11")
        };
    }
}

class ValidationParam {
    private string $name;
    private string $regex;
    private string $len_regex;
    private bool $required;
    private string $min_length;
    private string $max_length;

    public function __construct($name, $regex, $len_regex, $required, $min_length, $max_length) {
        $this->name = $name;
        $this->regex = $regex;
        $this->len_regex = $len_regex;
        $this->required = $required;
        $this->min_length = $min_length;
        $this->max_length = $max_length;
    }
    public function name(): string { return $this->name; }
    public function regex(): string { return $this->regex; }
    public function len_regex(): string { return $this->len_regex; }
    public function required(): string { return $this->required; }
    public function min_length(): string { return $this->min_length; }
    public function max_length(): string { return $this->max_length; }

    public function toArray() {
        return array (
            'name' => $this->name,
            'required' => $this->required,
            'min_length' => $this->min_length,
            'max_length' => $this->max_length,
            'regex' => $this->regex,
            'len_regex' => $this->len_regex
        );
    }

    public function toJson() {
            return json_encode([
                'name' => $this->name,
                'required' => $this->required,
                'min_length' => $this->min_length,
                'max_length' => $this->max_length,
                'regex' => $this->regex,
                'len_regex' => $this->len_regex
            ]);
        }
}


