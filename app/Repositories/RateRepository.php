<?php

namespace App\Repositories;

use App\Dto\Repositories\Rate\InputCreateRate;
use App\Dto\Repositories\Rate\InputUpdateRate;
use App\Dto\Repositories\Rate\OutputCreateRate;
use App\Dto\Repositories\Rate\OutputUpdateRate;
use App\Models\Rate;
use App\Repositories\Interfaces\IRateRepository;

class RateRepository implements IRateRepository
{

    public function create(InputCreateRate $input): OutputCreateRate
    {
        $rate = new Rate();
        $rate->setRate($input->getRate())
            ->setUserId($input->getUserId())
            ->setArticleId($input->getArticleId());

        $result = $rate->save();
        if (!$result) {
            $rate = null;
        }

        return (new OutputCreateRate())->setRate($rate);
    }

    public function update(InputUpdateRate $input): OutputUpdateRate
    {
        /** @var Rate $rate */
        $rate = Rate::query()
            ->where('user_id', value: $input->getUserId())
            ->where('article_id', value: $input->getArticleId())
            ->first();

        if ($rate != null) {
            $rate->setRate($input->getRate());
            $rate->save();
        }

        return (new OutputUpdateRate())->setRate($rate);
    }
}
