<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'event' => 'Cita #1',
                'start_date' => '2023-04-23 08:00',
                'end_date' => '2023-04-23 11:00',
            ],
            [
                'event' => 'Cita #2',
                'start_date' => '2023-04-24 10:00',
                'end_date' => '2023-04-24 11:00',
            ],
            [
                'event' => 'Cita #3',
                'start_date' => '2023-04-25 08:00',
                'end_date' => '2023-04-25 11:00',
            ],
            [
                'event' => 'Cita #4',
                'start_date' => '2023-04-26 09:00',
                'end_date' => '2023-04-26 11:00',
            ]
        ];

       foreach($events as $event){
        Event::create($event);
       }
    }
}
