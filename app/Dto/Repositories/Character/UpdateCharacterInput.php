<?php

namespace App\Dto\Repositories\Character;

class UpdateCharacterInput
{
    private int $id;

    private ?string $name;

    private ?string $image;

    private ?string $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UpdateCharacterInput
     */
    public function setId(int $id): UpdateCharacterInput
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return UpdateCharacterInput
     */
    public function setName(?string $name): UpdateCharacterInput
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return UpdateCharacterInput
     */
    public function setImage(?string $image): UpdateCharacterInput
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return UpdateCharacterInput
     */
    public function setDescription(?string $description): UpdateCharacterInput
    {
        $this->description = $description;
        return $this;
    }

}
