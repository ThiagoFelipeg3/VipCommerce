<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Color;
use Faker\Provider\Base;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => "produto_{$this->faker->randomNumber()}",
            'cor' => Color::colorName(),
            'tamanho' => Base::randomFloat(2, 0 , 10),
            'valor' => Base::randomFloat(2, 0, 9)
        ];
    }
}
