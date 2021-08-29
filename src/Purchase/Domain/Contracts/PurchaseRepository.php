<?php

declare(strict_types=1);

namespace Src\Purchase\Domain\Contracts;

use Src\Purchase\Domain\Purchase;

interface PurchaseRepository
{
    public function save(Purchase $purchase): void;
}
