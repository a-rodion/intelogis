<?php
declare(strict_types=1);

namespace app;

class ShippingCalculateResult implements \JsonSerializable
{
    protected ?float $price;
    protected ?string $date;
    protected string $error;

    public function __construct(string $error, ?float $price, ?string $date)
    {
        $this->error = $error;
        $this->price = $price;
        $this->date = $date;
    }

    public function jsonSerialize(): array
    {
        return [
            'price' => $this->price,
            'date' => $this->date,
            'error' => $this->error,
        ];
    }
}
