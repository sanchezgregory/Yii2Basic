<?php

namespace app\repositories;

use HttpRequest;
use yii\helpers\VarDumper;

class PokemonRepository
{

    private const GET_POKEMON_URI = "https://pokeapi.co/api/v2/pokemon/%s";
    /**
     * @param int $id
     */
    public function find(int|string $id): ?array
    {
        $path = sprintf(self::GET_POKEMON_URI, $id);
        $response = HttpRequest::get($path);
        VarDumper::dump($response);
        die;
        return $response?->json();
    }
}