<?php

declare(strict_types=1);

namespace Src\Purchase\Application\Create;

final class PurchaseCreatorRequest
{
    private $id;
    private $supplier;
    private $payTerm;
    private $date;
    private $createdBy;
    private $status;
    private $observations;

    public function __construct(
        string $id,
        string $supplier,
        string $payTerm,
        string $date,
        string $createdBy,
        string $status,
        string $observations
    )
    {
        $this->id = $id;
        $this->supplier = $supplier;
        $this->payTerm = $payTerm;
        $this->date = $date;
        $this->createdBy = $createdBy;
        $this->status = $status;
        $this->observations = $observations;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function supplier(): string
    {
        return $this->supplier;
    }

    public function payTerm(): string
    {
        return $this->payTerm;
    }

    public function date(): string
    {
        return $this->date;
    }

    public function createdBy(): string
    {
        return $this->createdBy;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function observations(): string
    {
        return $this->observations;
    }
}
