<?php

declare(strict_types=1);

namespace Tests\Unit\Purchase\Application\Create;

use Faker\Factory;
use Src\Purchase\Application\Create\PurchaseCreatorRequest;

final class PurchaseCreatorRequestMother
{
    public static function random(): PurchaseCreatorRequest
    {
        $faker = Factory::create();

        $id = $faker->uuid;
        $supplier = $faker->name;
        $payTerm = $faker->name;
        $date = $faker->date;
        $createdBy = $faker->name;
        $status = $faker->name;
        $observations = $faker->name;

        return new PurchaseCreatorRequest(
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
