<?php

declare(strict_types=1);

namespace Src\Purchase\Application\Create;

use Src\Purchase\Domain\Contracts\PurchaseRepository;
use Src\Purchase\Domain\Purchase;
use Src\Purchase\Domain\ValueObjects\PurchaseCreatedBy;
use Src\Purchase\Domain\ValueObjects\PurchaseDate;
use Src\Purchase\Domain\ValueObjects\PurchaseId;
use Src\Purchase\Domain\ValueObjects\PurchaseObservations;
use Src\Purchase\Domain\ValueObjects\PurchasePayTerm;
use Src\Purchase\Domain\ValueObjects\PurchaseStatus;
use Src\Purchase\Domain\ValueObjects\PurchaseSupplier;

final class PurchaseCreator
{
    private $repository;

    public function __construct(PurchaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(PurchaseCreatorRequest $request)
    {
        $id = new PurchaseId($request->id());
        $supplier = new PurchaseSupplier($request->supplier());
        $payTerm = new PurchasePayTerm($request->payTerm());
        $date = new PurchaseDate($request->date());
        $createdBy = new PurchaseCreatedBy($request->createdBy());
        $status = new PurchaseStatus($request->status());
        $observations = new PurchaseObservations($request->observations());

        $purchase = Purchase::create(
            $id,
            $supplier,
            $payTerm,
            $date,
            $createdBy,
            $status,
            $observations
        );

        $this->repository->save($purchase);
    }
}
