<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ZxIcon;
use App\Models\ZxInventoryItem;

class ZxInventoryItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ZxInventoryItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => ZxIcon::factory(),
            'parent_id' => ZxInventoryItem::factory(),
            'variant_or_part' => $this->faker->boolean,
            'name' => '{}',
            'description' => '{}',
            'model_no' => $this->faker->regexify('[A-Za-z0-9]{64}'),
            'barcode' => $this->faker->regexify('[A-Za-z0-9]{64}'),
            'photo_url' => $this->faker->regexify('[A-Za-z0-9]{128}'),
            'enabled' => $this->faker->boolean,
        ];
    }
}
