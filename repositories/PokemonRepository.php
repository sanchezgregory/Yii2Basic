<?php

namespace app\repositories;

use app\models\PokemonSerializer;
use HttpRequest;
use yii\helpers\VarDumper;
use yii\httpclient\Client;

class PokemonRepository
{
    private const GET_POKEMON_URI = "https://pokeapi.co/api/v2/pokemon/%s";
    /**
     * @param int $id
     */
    public function findByApi(int|string $id): ?array
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
        return $contentRaw;
    }
}