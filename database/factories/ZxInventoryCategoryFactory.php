<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ZxIcon;
use App\Models\ZxInventoryCategory;
use App\Models\ZxInventoryCategoryName;

class ZxInventoryCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ZxInventoryCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => ZxInventoryCategory::factory(),
            'category_name_id' => ZxInventoryCategoryName::factory(),
            'description' => '{}',
            'enabled' => $this->faker->boolean,
            'icon_id' => ZxIcon::factory(),
        ];
    }
}
