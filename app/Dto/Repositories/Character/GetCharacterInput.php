<?php

namespace App\Dto\Repositories\Character;

class GetCharacterInput
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
    public function setCharacterId(int $character_id): GetCharacterInput
    {
        $this->character_id = $character_id;
        return $this;
    }

}
