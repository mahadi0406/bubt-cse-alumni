<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Http\Request;

class EventService
{

    public function getEvents()
    {
       return Event::get();
    }
    public function prepParams(Request $request): array
    {
        return  [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date_time' => $request->input('date_time'),
            'location' => $request->input('location'),
            'total_seats' => $request->input('total_seats'),
        ];
    }

    public function save(array $params): Event
    {
        return Event::create($params);
    }

}
