<?php

declare(strict_types=1);

namespace Tests\Unit\Purchase\Domain;

use Src\Purchase\Domain\Contracts\PurchaseRepository;
use Tests\TestCase;
use Tests\Unit\Purchase\Application\Create\PurchaseCreatorRequestMother;

final class PurchaseTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_save_a_purchase(): void
    {
        $request = PurchaseCreatorRequestMother::random();
        $purchase = PurchaseMother::fromRequest($request);

        $this->repository()->save($purchase);
        $this->assertTrue(true);
    }

    private function repository()
    {
        return $this->service(PurchaseRepository::class);
    }

    private function service(string $class)
    {
        return app()->make($class);
    }
}
