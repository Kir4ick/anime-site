<?php

namespace App\Dto\Operations\Character;

use App\Models\Character;

class UpdateCharacterOutput
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
    public function setErrorMessage(?string $error_message): UpdateCharacterOutput
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
    public function setCharacter(?Character $character): UpdateCharacterOutput
    {
        $this->character = $character;
        return $this;
    }

}
