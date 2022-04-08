<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class EloquentController extends Controller
{
    public function task2()
    {
        $products = Item::query()->where('active', 1)->orderByDesc('created_at')->limit(3)->get();

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task3()
    {
        $products = Item::query()->active()->get();

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task4($id)
    {

        $product = Item::query()->findOrFail($id);

        return view('eloquent.task4', [
            'product' => $product
        ]);
    }

    public function task5(Request $request)
    {
        Item::create($request->all());

        return redirect('/');
    }

    public function task6($id, Request $request)
    {
        $product = Item::findOrFail($id);
        $product->update($request->all());

        return redirect('/');
    }

    public function task7(Request $request)
    {
        Item::query()->whereIn('id',$request->all()['products'])->delete();

        return redirect('/');
    }
}
