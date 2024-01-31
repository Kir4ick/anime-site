<?php

namespace App\Http\Controllers\RestApi;

use App\Dto\Operations\Rate\InputCreateRate;
use App\Dto\Operations\Rate\InputUpdateRate;
use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\IRateOperation;
use App\Http\Requests\RestApi\Rate\RateRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\Rate\Rate;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function __construct(
        private readonly IRateOperation $operation
    ){}

    public function create(RateRequest $request, int $article_id)
    {
        $input_operation = new InputCreateRate();
        $input_operation->setRate($request->rate)
            ->setArticleId($article_id)
            ->setUserId(Auth::id());

        $result = $this->operation->create($input_operation);
        if ($result->getErrorMessage() !== null) {
            return new ErrorResource([
                'error_message' => $result->getErrorMessage(),
                'code' => 500
            ]);
        }

        return new Rate($result->getRate());
    }

    public function update(RateRequest $request, int $article_id)
    {
        $input_operation = new InputUpdateRate();
        $input_operation->setRate($request->rate)
            ->setArticleId($article_id)
            ->setUserId(Auth::id());

        $result = $this->operation->update($input_operation);
        if ($result->getErrorMessage() !== null) {
            return new ErrorResource([
                'error_message' => $result->getErrorMessage(),
                'code' => 500
            ]);
        }

        return new Rate($result->getRate());
    }

}
