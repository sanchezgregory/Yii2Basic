<?php

namespace app\models;

use yii\db\Exception;
use yii\validators\Validator;
use yii\web\ForbiddenHttpException;
use function PHPStan\dumpType;

class PokemonSerializer
{

    /**
     * @throws ForbiddenHttpException
     */
    public function deserialize(?array $raw): ?Pokemon
    {
        try {
            if (isset($raw['id']) && isset($raw['name']) && isset($raw['order']) && isset($raw['weight']) && isset($raw['base_experience'])) {

                $pokemon = new Pokemon($raw['id'], $raw['name'], $raw['order'], $raw['weight'], $raw['base_experience']);

                if ($pokemon->validate()) {
                    return $pokemon;
                }

                throw new ForbiddenHttpException('Validation errors found: ' . json_encode($pokemon->errors));

            }
            return null;
        } catch(\Exception $exception) {
            throw new ForbiddenHttpException($exception->getMessage());
        }

    }
}