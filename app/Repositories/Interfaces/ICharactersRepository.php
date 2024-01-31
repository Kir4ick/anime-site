<?php

namespace App\Repositories\Interfaces;

use App\Dto\Repositories\Character\CreateCharacterInput;
use App\Dto\Repositories\Character\CreateCharacterOutput;
use App\Dto\Repositories\Character\GetCharacterInput;
use App\Dto\Repositories\Character\GetCharacterOutput;
use App\Dto\Repositories\Character\GetCharactersInput;
use App\Dto\Repositories\Character\GetCharactersOutput;
use App\Dto\Repositories\Character\RemoveCharacterInput;
use App\Dto\Repositories\Character\RemoveCharacterOutput;
use App\Dto\Repositories\Character\UpdateCharacterInput;
use App\Dto\Repositories\Character\UpdateCharacterOutput;

interface ICharactersRepository
{
    public function create(
        CreateCharacterInput $input
    ): CreateCharacterOutput;

    public function list(
        GetCharactersInput $input
    ): GetCharactersOutput;

    public function update(
        UpdateCharacterInput $input
    ): UpdateCharacterOutput;

    public function one(
        GetCharacterInput $input
    ): GetCharacterOutput;

    public function remove(
        RemoveCharacterInput $input
    ): RemoveCharacterOutput;
}
