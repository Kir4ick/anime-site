<?php

namespace App\Dto\Repositories\Character;

use App\Models\Character;

class RemoveCharacterOutput
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
    public function setCharacter(?Character $character): RemoveCharacterOutput
    {
        $this->character = $character;
        return $this;
    }
}
