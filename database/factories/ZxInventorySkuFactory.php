<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ZxInventoryItem;
use App\Models\ZxInventorySku;

class ZxInventorySkuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ZxInventorySku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => ZxInventoryItem::factory(),
            'parent_id' => ZxInventorySku::factory(),
            'batch_no' => $this->faker->regexify('[A-Za-z0-9]{64}'),
            'serial_no' => $this->faker->regexify('[A-Za-z0-9]{128}'),
            'photo_url' => $this->faker->regexify('[A-Za-z0-9]{128}'),
            'enabled' => $this->faker->boolean,
        ];
    }
}
