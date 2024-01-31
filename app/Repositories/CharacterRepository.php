<?php

namespace App\Repositories;

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
use App\Models\Character;
use App\Repositories\Interfaces\ICharactersRepository;

class CharacterRepository implements ICharactersRepository
{

    public function create(CreateCharacterInput $input): CreateCharacterOutput
    {
        $character = new Character();
        $character->setName($input->getName())
            ->setDescription($input->getDescription())
            ->setImage($input->getImage());

        $character->save();

        return (new CreateCharacterOutput())->setCharacter($character);
    }

    public function list(GetCharactersInput $input): GetCharactersOutput
    {
        // TODO: Implement list() method.
    }

    public function update(UpdateCharacterInput $input): UpdateCharacterOutput
    {
        $updated = [];

        if ($input->getImage() != null) {
            $updated['image'] = $input->getImage();
        }

        if ($input->getName() != null) {
            $updated['name'] = $input->getName();
        }

        if ($input->getDescription() != null) {
            $updated['description'] = $input->getDescription();
        }

        $updated_character = null;

        $character = Character::query()
            ->where('id', value: $input->getId())
            ->update($updated);

        if ($character === 1) {
            $updated_character = Character::query()->find($input->getId());
        }

        return (new UpdateCharacterOutput())->setCharacter($updated_character);
    }

    public function one(GetCharacterInput $input): GetCharacterOutput
    {
        return (new GetCharacterOutput())->setCharacter(
            Character::query()->find($input->getCharacterId())
        );
    }

    public function remove(RemoveCharacterInput $input): RemoveCharacterOutput
    {
        $output = new RemoveCharacterOutput();

        $character = Character::query()->find($input->getCharacterId());
        if ($character == null) {
            return $output->setCharacter($character);
        }

        $character->delete();

        return $output->setCharacter($character);
    }
}
