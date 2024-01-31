<?php

namespace App\Dto\Repositories\Character;

class RemoveCharacterInput
{
    private int $character_id;

    /**
     * @return int
     */
    public function getCharacterId(): int
    {
        return $this->character_id;
    }

    /**
     * @param int $character_id
     * @return GetCharacterInput
     */
    public function setCharacterId(int $character_id): RemoveCharacterInput
    {
        $this->character_id = $character_id;
        return $this;
    }

}
