<?php

namespace app\services;

use app\models\PokemonSerializer;
use yii\httpclient\Client;
use app\repositories\PokemonRepository;
use Yii;
use yii\helpers\VarDumper;

class ArticleService
{
    private const GET_POKEMON_URI = "https://pokeapi.co/api/v2/pokemon/%s";
    private PokemonSerializer $pokemonSerializer;

    public function __construct()
    {
        $this->pokemonSerializer = new PokemonSerializer();
    }

    public function getPokemon(int $id)
    {
        $path = sprintf(self::GET_POKEMON_URI, $id);
        $contentRaw = null;
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($path)
            ->send();
        if ($response->isOk) {
            $contentRaw = $response->data;
        }

        return $this->pokemonSerializer->deserialize($contentRaw);

    }
}