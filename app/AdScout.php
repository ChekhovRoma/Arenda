<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AdScout extends Model
{
    public static function find($filters)
    {
        $ads = Ad::query();

        $ads->join('rooms', 'ads.room_id', '=', 'rooms.id');
        $ads->join('places', 'rooms.place_id', '=', 'places.id');

        if (!empty($filters['city'])) {
            $ads->where('places.city', '=', $filters['city']);
        }
        if (!empty($filters['name'])) {
            $ads->where('places.name', '=', $filters['name']);
        }
        if (!empty($filters['placeType'])) {
            $ads->where('places.place_type_id', '=', (integer)$filters['placeType']);
        }
        if (!empty($filters['minPrice'])) {
            $ads->where('rooms.price', '>=', $filters['minPrice']);
        }
        if (!empty($filters['maxPrice'])) {
            $ads->where('rooms.price', '<=', $filters['maxPrice']);
        }
        if (!empty($filters['orderBy'])) {
            if ($filters['orderBy'] == 'pricesAscending') {
                $ads->orderBy('rooms.price');
            }
            if ($filters['orderBy'] == 'pricesDescending'){
                $ads->orderBy('rooms.price', 'desc');
            }
        }

        $ads->where('ads.status_id', '=', 1);

        return $ads;
    }
}
