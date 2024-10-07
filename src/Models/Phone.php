<?php
namespace App\Models;

class Phone {
    protected string $fio;
    protected string $code;
    protected string $number;

    public function __construct(mixed $args) {
        $this->fio = isset($args['fio']) ? $args['fio'] : "";
        $this->code = isset($args['code']) ? $args['code'] : "";
        $this->number = isset($args['number']) ? $args['number'] : "";
    }

    public function fio(): string { return $this->fio; }
    public function code(): string { return $this->code; }
    public function number(): string { return $this->number; }

    public function toJson() {
        return json_encode([
            'fio' => $this->fio,
            'code' => $this->code,
            'number' => $this->number
        ]);
    }
}
