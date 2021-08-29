<?php

declare(strict_types=1);

namespace Tests\Unit\Purchase\Application\Create;

use Mockery;
use Mockery\Matcher\MatcherAbstract;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Src\Purchase\Application\Create\PurchaseCreator;
use Src\Purchase\Domain\Contracts\PurchaseRepository;
use Src\Purchase\Domain\Purchase;
use Tests\Unit\Purchase\Domain\PurchaseMother;
use Tests\Unit\Shared\MatcherIsSimilar;

final class PurchaseCreatorTest extends TestCase
{
    /**
     * @test
     */

    public function it_should_create_a_valid_purchase_and_return_null()
    {
        $request = PurchaseCreatorRequestMother::random();
        $purchase = PurchaseMother::fromRequest($request);
        $this->shouldCreate($purchase);

        $creator = new PurchaseCreator($this->repository());
        $response = ($creator)($request);

        self::assertNull($response);
    }

    private function shouldCreate(Purchase $purchase)
    {
        $this->repository()
            ->shouldReceive("save")
            ->with($this->similarTo($purchase))
            ->once()
            ->andReturnNull();
    }

    private function repository()
    {
        return $this->repository = $this->repository ?? $this->mock(PurchaseRepository::class);
    }

    private function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }

    private function similarTo($value, $delta = 0.0): MatcherAbstract
    {
        return new MatcherIsSimilar($value, $delta);
    }
}
