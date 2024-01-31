<?php

namespace App\Dto\Repositories\Character;

class CreateCharacterInput
{
    private string $name;

    private string $image;

    private string $description;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateCharacterInput
     */
    public function setName(string $name): CreateCharacterInput
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return CreateCharacterInput
     */
    public function setImage(string $image): CreateCharacterInput
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return CreateCharacterInput
     */
    public function setDescription(string $description): CreateCharacterInput
    {
        $this->description = $description;
        return $this;
    }

}
