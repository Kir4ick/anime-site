<?php

namespace App\Http\Operations;

use App\Dto\Operations\Rate\InputCreateRate;
use App\Dto\Operations\Rate\InputUpdateRate;
use App\Dto\Operations\Rate\OutputCreateRate;
use App\Dto\Operations\Rate\OutputUpdateRate;
use App\Http\Operations\Interfaces\IRateOperation;
use App\Repositories\Interfaces\IRateRepository;

class RateOperations implements IRateOperation
{

    public function __construct(
        private readonly IRateRepository $repository
    ){}

    public function create(InputCreateRate $input): OutputCreateRate
    {
        $input_repository = new \App\Dto\Repositories\Rate\InputCreateRate();
        $input_repository->setRate($input->getRate())
            ->setArticleId($input->getArticleId())
            ->setUserId($input->getUserId());

        $result = $this->repository->create($input_repository);

        return (new OutputCreateRate())->setRate($result->getRate());
    }

    public function update(InputUpdateRate $input): OutputUpdateRate
    {
        $input_repository = new \App\Dto\Repositories\Rate\InputUpdateRate();
        $input_repository->setRate($input->getRate())
            ->setArticleId($input->getArticleId())
            ->setUserId($input->getUserId());

        $result = $this->repository->update($input_repository);

        return (new OutputUpdateRate())->setRate($result->getRate());
    }
}
