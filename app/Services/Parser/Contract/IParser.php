<?php

namespace App\Services\Parser\Contract;

use App\Services\Parser\Models\Abstracts\AbstractParseModel;

interface IParser
{

    /**
     * Парсит из json|xml в удобно читаемый вид
     *
     * @param string $string
     * @return array|AbstractParseModel|null
     */
    public function parse(string $string): array|AbstractParseModel|null;
}
