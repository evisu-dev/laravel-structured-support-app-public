<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Reception;

final class SupportReceptionDto
{
    private int $customerId;
    private string $subject;
    private string $description;
    private int $status; // SupportStatusType::RECEPTION の想定

    public function __construct(
        int    $customerId,
        string $subject,
        string $description,
        int    $status
    )
    {
        $this->customerId = $customerId;
        $this->subject = $subject;
        $this->description = $description;
        $this->status = $status;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
