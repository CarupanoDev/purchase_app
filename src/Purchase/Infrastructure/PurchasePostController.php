<?php

declare(strict_types=1);

namespace Src\Purchase\Infrastructure;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Src\Purchase\Application\Create\PurchaseCreator;
use Src\Purchase\Application\Create\PurchaseCreatorRequest;

final class PurchasePostController
{
    private $creator;

    public function __construct(PurchaseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(Request $request)
    {
        ($this->creator)(new PurchaseCreatorRequest(
            $request->id,
            $request->supplier,
            $request->payTerm,
            $request->date,
            $request->createdBy,
            $request->status,
            $request->observations
        ));

        return new JsonResponse([], Response::HTTP_CREATED);
    }
}
