<?php

namespace app\models;

use yii\validators\Validator;

class PokemonSerializer
{
//    public function rules()
//    {
//        return [
//            ['id', 'name', 'order', 'weight'] , 'required'
//        ];
//    }
    public function deserialize(?array $raw): ?Pokemon
    {
        if (isset($raw['id']) && isset($raw['name']) && isset($raw['order']) && isset($raw['weight']) && isset($raw['base_experience'])) {
           return new Pokemon($raw['id'], $raw['name'], $raw['order'], $raw['weight'], $raw['base_experience']);
        }
        return null;
    }
}