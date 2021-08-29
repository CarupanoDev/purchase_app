<?php

declare(strict_types=1);

namespace Tests\Unit\Purchase\Domain;

use Src\Purchase\Application\Create\PurchaseCreatorRequest;
use Src\Purchase\Domain\Purchase;
use Src\Purchase\Domain\ValueObjects\PurchaseCreatedBy;
use Src\Purchase\Domain\ValueObjects\PurchaseDate;
use Src\Purchase\Domain\ValueObjects\PurchaseId;
use Src\Purchase\Domain\ValueObjects\PurchaseObservations;
use Src\Purchase\Domain\ValueObjects\PurchasePayTerm;
use Src\Purchase\Domain\ValueObjects\PurchaseStatus;
use Src\Purchase\Domain\ValueObjects\PurchaseSupplier;

final class PurchaseMother
{
    public static function fromRequest(PurchaseCreatorRequest $request): Purchase
    {
        $id = new PurchaseId($request->id());
        $supplier = new PurchaseSupplier($request->supplier());
        $payTerm = new PurchasePayTerm($request->payTerm());
        $date = new PurchaseDate($request->date());
        $createdBy = new PurchaseCreatedBy($request->createdBy());
        $status = new PurchaseStatus($request->status());
        $observations = new PurchaseObservations($request->observations());

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
