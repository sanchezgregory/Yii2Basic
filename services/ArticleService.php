<?php

namespace app\services;

use app\models\Pokemon;
use app\models\PokemonSerializer;
use yii\httpclient\Client;
use app\repositories\PokemonRepository;
use Yii;
use yii\helpers\VarDumper;
use yii\web\ForbiddenHttpException;

class ArticleService
{
    private const GET_POKEMON_URI = "https://pokeapi.co/api/v2/pokemon/%s";
    private PokemonRepository $pokemonRepository;
    private PokemonSerializer $pokemonSerializer;

    public function __construct()
    {
        $this->pokemonSerializer = new PokemonSerializer();
        $this->pokemonRepository = new PokemonRepository();
    }

    /**
     * @throws ForbiddenHttpException
     */
    public function getPokemon(int $id): ?Pokemon
    {
        $pokemonData = $this->pokemonRepository->findByApi($id);

        if ($pokemonData) {
            return $this->pokemonSerializer->deserialize($pokemonData);
        }

        return null;

    }
}