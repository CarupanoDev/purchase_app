<?php

declare(strict_types=1);

namespace Src\Purchase\Infrastructure\Repositories;

use Src\Purchase\Domain\Contracts\PurchaseRepository;
use App\Models\Purchase as EloquentModel;
use Src\Purchase\Domain\Purchase;

final class EloquentPurchaseRepository implements PurchaseRepository
{
    private $eloquentModel;

    public function __construct(EloquentModel $eloquentModel)
    {
        $this->eloquentModel = $eloquentModel;
    }

    public function save(Purchase $purchase): void
    {
        $data = [
            "id" => $purchase->id()->value(),
            "supplier" => $purchase->supplier()->value(),
            "pay_term" => $purchase->payTerm()->value(),
            "date" => $purchase->date()->value(),
            "created_by" => $purchase->createdBy()->value(),
            "status" => $purchase->status()->value(),
            "observations" => $purchase->observations()->value()
        ];

        $this->eloquentModel->create($data);
    }
}
