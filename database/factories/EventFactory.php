<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gdpr\Models\Event;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
<<<<<<< .merge_file_exz39X
<<<<<<< HEAD
     * @return array<string, string>
=======
     * @return array<string, mixed>
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
=======
     * <<<<<<< HEAD.
     *
     * @return array<string, string>
     *                               =======
     * @return array<string, mixed>
     *                               >>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
>>>>>>> .merge_file_Gl2Hao
     */
    public function definition(): array
    {
        return [
            'subject_id' => fake()->uuid(),
            'ip' => '127.0.0.1',
            'action' => 'consent_given',
            'payload' => '{}',
        ];
    }
}
