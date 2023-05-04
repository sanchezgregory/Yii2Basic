<?php

namespace app\models;

class Pokemon
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $baseExperience,
        public readonly int $order,
        public readonly int $weight
    ){
    }
}