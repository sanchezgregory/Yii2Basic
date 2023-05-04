<?php

namespace app\models;

use app\services\SampleService;

class Alpha
{
    public SampleService $sampleService;

    public function __construct(SampleService $sampleService)
    {
        $this->sampleService = $sampleService;

    }

    /**
     * @param int[] $ids
     * @return string[]
     */
    public function find(array $ids): array {
        $ids = ['1', '2', '3'];

        $samples = $this->sampleService->find($ids);
        $names = [];

        foreach ($samples as $sample) {
            $names[] = $sample->text;
        }
        return $names;
    }
}