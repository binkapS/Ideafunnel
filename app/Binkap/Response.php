<?php

namespace App\Binkap;

class Response
{

    private int|null $code;

    private string|null $message;

    private function __construct(string|null $message, int|null $code)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public static function deny(string $message = null, int $code = null): static
    {
        return (new static($message, $code));
    }

    public function view()
    {
        return \view('service.response', [
            'message' => $this->message,
            'code' => $this->code
        ]);
    }

    public function json()
    {
        return \json_encode([
            'message' => $this->message,
            'code' => $this->code
        ]);
    }
}
