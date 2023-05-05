<?php

namespace app\models;

use yii\base\Model;

class Pokemon extends Model
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $baseExperience,
        public readonly int $order,
        public readonly int $weight
    ){
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Nombre',
            'order' => 'Orden',
            'weight' => 'Peso'
        ];
    }

    public function rules()
    {
        return [
            [['id', 'name', 'order', 'weight'], 'required', 'message'=> 'Asegurate de agregar todos los datos'],
        ];
    }


}