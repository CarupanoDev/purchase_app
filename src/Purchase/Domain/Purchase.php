<?php

declare(strict_types=1);

namespace Src\Purchase\Domain;

use Src\Purchase\Domain\ValueObjects\PurchaseCreatedBy;
use Src\Purchase\Domain\ValueObjects\PurchaseDate;
use Src\Purchase\Domain\ValueObjects\PurchaseId;
use Src\Purchase\Domain\ValueObjects\PurchaseObservations;
use Src\Purchase\Domain\ValueObjects\PurchasePayTerm;
use Src\Purchase\Domain\ValueObjects\PurchaseStatus;
use Src\Purchase\Domain\ValueObjects\PurchaseSupplier;

final class Purchase
{
    private $id;
    private $supplier;
    private $payTerm;
    private $date;
    private $createdBy;
    private $status;
    private $observations;

    public function __construct(
        PurchaseId           $id,
        PurchaseSupplier     $supplier,
        PurchasePayTerm      $payTerm,
        PurchaseDate         $date,
        PurchaseCreatedBy    $createdBy,
        PurchaseStatus       $status,
        PurchaseObservations $observations
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

    public function id(): PurchaseId
    {
        return $this->id;
    }

    public function supplier(): PurchaseSupplier
    {
        return $this->supplier;
    }

    public function payTerm(): PurchasePayTerm
    {
        return $this->payTerm;
    }

    public function date(): PurchaseDate
    {
        return $this->date;
    }

    public function createdBy(): PurchaseCreatedBy
    {
        return $this->createdBy;
    }

    public function status(): PurchaseStatus
    {
        return $this->status;
    }

    public function observations(): PurchaseObservations
    {
        return $this->observations;
    }

    public static function create(
        PurchaseId           $id,
        PurchaseSupplier     $supplier,
        PurchasePayTerm      $payTerm,
        PurchaseDate         $date,
        PurchaseCreatedBy    $createdBy,
        PurchaseStatus       $status,
        PurchaseObservations $observations
    ): self
    {
        return new Purchase(
            $id,
            $supplier,
            $payTerm,
            $date,
            $createdBy,
            $status,
            $observations
        );
    }
}
