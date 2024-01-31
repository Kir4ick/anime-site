<?php

namespace App\Http\Operations\Interfaces;

use App\Dto\Operations\Character\CreateCharacterInput;
use App\Dto\Operations\Character\CreateCharacterOutput;
use App\Dto\Operations\Character\GetCharacterInput;
use App\Dto\Operations\Character\GetCharacterOutput;
use App\Dto\Operations\Character\GetCharactersInput;
use App\Dto\Operations\Character\GetCharactersOutput;
use App\Dto\Operations\Character\RemoveCharacterInput;
use App\Dto\Operations\Character\RemoveCharacterOutput;
use App\Dto\Operations\Character\UpdateCharacterInput;
use App\Dto\Operations\Character\UpdateCharacterOutput;

interface ICharacterOperation
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
