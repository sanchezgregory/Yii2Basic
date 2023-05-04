<?php

namespace app\models;

class Sample
{
    public function __construct(public readonly int $id, public readonly string $text)
    {
    }
}