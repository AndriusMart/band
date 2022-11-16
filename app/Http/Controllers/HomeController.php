<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{



    public function homeList(Request $request)
    {
        $dishes = Dish::where('id', '>', '0');
        if ($request->subCat || $request->cat || $request->sort) {
            if ($request->cat) {
                $dishes = $dishes->where('restaurant_id', 'like', '%' . $request->cat  . '%');
            }

            if ($request->sort == 'price_asc') {
                $dishes = $dishes->orderBy('price', 'asc');
            } else if ($request->sort == 'price_desc') {
                $dishes = $dishes->orderBy('price', 'desc');
            }
            if ($request->sort == 'rate_asc') {
                $dishes = $dishes->orderBy('rating', 'asc');
            } else if ($request->sort == 'rate_desc') {
                $dishes = $dishes->orderBy('rating', 'desc');
            } else if ($request->sort == 'title_asc') {
                $dishes = $dishes->orderBy('title', 'asc');
            } else if ($request->sort == 'title_desc') {
                $dishes = $dishes->orderBy('title', 'desc');
            }
        }
        $perPage = match ($request->per_page) {
            '5' => 5,
            '11' => 11,
            '20' => 20,
            default => 11
        };

        if ($request->s) {
            $dishes = $dishes->where('title', 'like', '%' . $request->s . '%');
        }


        return view('home.index', [
            'dishes' => $dishes->orderBy('title', 'asc')->paginate($perPage)->withQueryString(),
            'restaurants' => Restaurant::orderBy('title', 'desc')->get(),
            'cat' => $request->cat ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Dish::SORT_SELECT,
            's' => $request->s ?? '',
            'perPage' => $request->per_page
        ]);
    }
    public function rate(Request $request, Dish $dish)
    {
        $votes = json_decode($dish->votes ?? json_encode([]));
        if (in_array(Auth::user()->id, $votes)) {
            return redirect()->back()->with('not', 'You already rated this item');
        }
        $votes[] = Auth::user()->id;
        $dish->votes = json_encode($votes);
        $dish->rating_sum = $dish->rating_sum + $request->rate;
        $dish->rating_count++;
        $dish->rating = $dish->rating_sum / $dish->rating_count;
        $dish->save();
        return redirect()->back()->with('ok', 'Thanks for rating this item');
    }



}
