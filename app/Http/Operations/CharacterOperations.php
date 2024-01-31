<?php

namespace App\Http\Operations;

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
use App\Http\Operations\Interfaces\ICharacterOperation;
use App\Repositories\Interfaces\ICharactersRepository;
use App\Services\ImageLoader\Interfaces\IImageLoader;

class CharacterOperations implements ICharacterOperation
{

    public function __construct(
        private readonly IImageLoader $loader,
        private readonly ICharactersRepository $repository
    ){}

    public function create(CreateCharacterInput $input): CreateCharacterOutput
    {
        $output = new CreateCharacterOutput();

        $image_path = $this->loader->load($input->getImage(), '/characters');
        if ($image_path === '') {
            $error_message = __('Не удалось сохранить фотографию');
            return $output->setErrorMessage($error_message);
        }

        $input_repository = new \App\Dto\Repositories\Character\CreateCharacterInput();
        $input_repository->setImage($image_path)
            ->setDescription($input->getDescription())
            ->setName($input->getName());

        $result = $this->repository->create($input_repository);
        $error_message = $result->getErrorMessage();
        if ($result->getCharacter() == null) {
            $error_message = __('Не удалось создать новую запись');
        }

        return $output->setErrorMessage($error_message)->setCharacter($result->getCharacter());
    }

    public function list(GetCharactersInput $input): GetCharactersOutput
    {
        $offset = 0;
        if ($input->getLimit() != 0 && $input->getPage() != 0) {
            $offset = $input->getLimit() * $input->getPage();
        }

        $input_repository = new \App\Dto\Repositories\Character\GetCharactersInput();
        $input_repository->setLimit($input->getLimit())
            ->setArticleId($input->getArticleId())
            ->setOffset($offset);

        $result = $this->repository->list($input_repository);
        $error_message = $result->getErrorMessage();
        if ($result->getCharactersCollection() == null) {
            $error_message = __('Нет данных');
        }

        return (new GetCharactersOutput())
            ->setLimit($input->getLimit())
            ->setErrorMessage($error_message)
            ->setCharactersCollection($result->getCharactersCollection())
            ->setPage($input->getPage());
    }

    public function update(UpdateCharacterInput $input): UpdateCharacterOutput
    {
        $output = new UpdateCharacterOutput();

        $image_path = $this->loader->load($input->getImage(), '/characters');
        if ($image_path === '') {
            $error_message = __('Не удалось сохранить фотографию');
            return $output->setErrorMessage($error_message);
        }

        $input_repository = new \App\Dto\Repositories\Character\UpdateCharacterInput();
        $input_repository->setImage($image_path)
            ->setDescription($input->getDescription())
            ->setName($input->getName())
            ->setId($input->getId());

        $result = $this->repository->update($input_repository);
        $error_message = $result->getErrorMessage();
        if ($result->getCharacter() == null) {
            $error_message = __('Не удалось обновить запись');
        }

        return $output->setErrorMessage($error_message)->setCharacter($result->getCharacter());
    }

    public function one(GetCharacterInput $input): GetCharacterOutput
    {
        $input_repository = new \App\Dto\Repositories\Character\GetCharacterInput();
        $input_repository->setCharacterId($input->getCharacterId());

        $result = $this->repository->one($input_repository);

        return (new GetCharacterOutput())->setCharacter($result->getCharacter());
    }

    public function remove(RemoveCharacterInput $input): RemoveCharacterOutput
    {
        $input_repository = new \App\Dto\Repositories\Character\RemoveCharacterInput();
        $input_repository->setCharacterId($input->getCharacterId());

        $result = $this->repository->remove($input_repository);

        return (new RemoveCharacterOutput())->setCharacter($result->getCharacter());
    }
}
