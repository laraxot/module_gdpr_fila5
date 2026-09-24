<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gdpr\Models\Treatment;

/**
 * @extends Factory<Treatment>
 */
class TreatmentFactory extends Factory
{
    protected $model = Treatment::class;

    /**
<<<<<<< .merge_file_dC8ykt
<<<<<<< HEAD
     * @return array<string, bool|int|string>
=======
     * @return array<string, mixed>
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
=======
     * <<<<<<< HEAD.
     *
     * @return array<string, bool|int|string>
     *                                        =======
     * @return array<string, mixed>
     *                                        >>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
>>>>>>> .merge_file_ZHe14u
     */
    public function definition(): array
    {
        return [
            'name' => 'treatment-'.fake()->unique()->uuid(),
            'description' => fake()->sentence(),
            'weight' => fake()->numberBetween(1, 10),
            'active' => true,
            'required' => false,
        ];
    }
}
