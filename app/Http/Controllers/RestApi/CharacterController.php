<?php

namespace App\Http\Controllers\RestApi;

use App\Dto\Operations\Character\GetCharacterInput;
use App\Dto\Operations\Character\GetCharactersInput;
use App\Dto\Operations\Character\RemoveCharacterInput;
use App\Dto\Operations\Character\UpdateCharacterInput;
use App\Dto\Operations\Character\CreateCharacterInput;
use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\ICharacterOperation;
use App\Http\Requests\RestApi\Characters\CharactersCreateRequest;
use App\Http\Requests\RestApi\Characters\CharactersUpdateRequest;
use App\Http\Resources\Character\Character;
use App\Http\Resources\ErrorResource;

class CharacterController extends Controller
{
    public function __construct(
        private readonly ICharacterOperation $operation
    ){}

    public function create(CharactersCreateRequest $request)
    {
        $operation_input = new CreateCharacterInput();
        $operation_input->setName($request->name)
            ->setDescription($request->description)
            ->setImage($request->image);

        $result = $this->operation->create($operation_input);
        if ($result->getErrorMessage() !== null) {
            return new ErrorResource([
                'error_message' => $result->getErrorMessage(),
                'code' => 500
            ]);
        }

        return new Character($result->getCharacter());
    }

    public function remove(int $id)
    {
        $operation_input = new RemoveCharacterInput();
        $operation_input->setCharacterId($id);

        $result = $this->operation->remove($operation_input);

        return new Character($result->getCharacter());
    }

    public function list(?int $article_id)
    {
        $operation_input = new GetCharactersInput();
        $operation_input->setArticleId($article_id);

        $result = $this->operation->list($operation_input);

        return Character::collection($result->getCharactersCollection());
    }

    public function one(int $id)
    {
        $result = $this->operation->one(
            (new GetCharacterInput)->setCharacterId($id)
        );

        return new Character($result);
    }

    public function update(CharactersUpdateRequest $request, int $id)
    {
        $operation_input = new UpdateCharacterInput();
        $operation_input->setName($request->name)
            ->setDescription($request->description)
            ->setImage($request->image)
            ->setId($id);

        $result = $this->operation->update($operation_input);
        if ($result->getErrorMessage() !== null) {
            return new ErrorResource([
                'error_message' => $result->getErrorMessage(),
                'code' => 500
            ]);
        }

        return new Character($result->getCharacter());
    }
}
