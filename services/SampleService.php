<?php

namespace app\services;

use app\models\Sample;

class SampleService
{

    /**
     * @param int[] $ids
     * @return Sample[]
     */
    public function find(array $ids): array
    {
        return array_map(fn($id) => (new Sample($id, 'alpha')), $ids);
    }
}