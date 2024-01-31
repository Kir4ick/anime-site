<?php

namespace App\Dto\Repositories\Character;

use App\Models\Character;

class CreateCharacterOutput
{
    private ?string $error_message = null;

    private ?Character $character;

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    /**
     * @param string|null $error_message
     * @return CreateCharacterOutput
     */
    public function setErrorMessage(?string $error_message): CreateCharacterOutput
    {
        $this->error_message = $error_message;
        return $this;
    }

    /**
     * @return Character|null
     */
    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    /**
     * @param Character|null $character
     * @return CreateCharacterOutput
     */
    public function setCharacter(?Character $character): CreateCharacterOutput
    {
        $this->character = $character;
        return $this;
    }

}
