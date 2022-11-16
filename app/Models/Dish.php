<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'restaurant_id'];

    const SORT_SELECT = [
        ['title_asc', 'Titile A-Z'],
        ['title_desc', 'Titile Z-A'],
        ['rate_asc', 'Rating 1-9'],
        ['rate_desc', 'Rating 9-1'],
        ['price_asc', 'Price 1-9'],
        ['price_desc', 'Price 9-1'],
    ];

    public function getRestaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function getPhotos()
    {
        return $this->hasMany(dishImage::class, 'dish_id', 'id');
    }

    public function lastImageUrl()
    {
        return $this->getPhotos()->orderBy('id', 'desc')->first()->url;
    }

    public function removeImages(?array $photos): self
    {
        if ($photos) {
            $toDelete = dishImage::whereIn('id', $photos)->get();
            foreach ($toDelete as $photo) {
                $file = public_path() . '/images/' . pathinfo($photo->url, PATHINFO_FILENAME) . '.' . pathinfo($photo->url, PATHINFO_EXTENSION);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            dishImage::destroy($photos);
        }
        return $this;
    }

    public function addImages(?array $photos): self
    {
        if ($photos) {
            $dishImage = [];
            $time = Carbon::now();
            foreach ($photos as $photo) {
                $ext = $photo->getClientOriginalExtension();
                $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
                $photo->move(public_path() . '/images', $file);
                $dishImage[] = [
                    'url' => asset('/images') . '/' . $file,
                    'dish_id' => $this->id,
                    'created_at' => $time,
                    'updated_at' => $time,

                ];
            }
            dishImage::insert($dishImage);
        }
        return $this;
    }
}
