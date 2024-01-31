<?php

namespace App\Dto\Operations\Character;

use App\Models\Character;

class GetCharacterOutput
{
    private ?Character $character;

    /**
     * @return Character|null
     */
    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    /**
     * @param Character|null $character
     * @return GetCharacterOutput
     */
    public function setCharacter(?Character $character): GetCharacterOutput
    {
        $this->character = $character;
        return $this;
    }
}
