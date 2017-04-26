<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Food;
use App\Category;
use App\User;
use App\Http\Requests\StoreFood;

class FoodController extends Controller {

    public function index() {
        $foods = Food::all();
        return view('admin.food.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $selectCa = null;
        $selectUs = null;
        return view('admin.food.create', compact('categories', 'selectCa', 'selectUs', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFood $request) {
        $array = $request->all();
        $imageName = str_random(40) . '.' .
                $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(
                base_path() . '/public/img/food/', $imageName
        );
        $array['device_token'] = $array['_token'];
        $array['image'] = $imageName;
        Food::create($array);
        return redirect(route('admin.food.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $food = Food::whereId($id)->first();
        if (empty($food)) {
            Flash::error('Food not found');

            return redirect(route('admin.food.index'));
        }
        return view('admin.food.show', [
            'food' => $food,
            'folder' => "food",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $food_edit = Food::whereId($id)->first();
        $categories = Category::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $selectCa = $food_edit->category->id;
        $selectUs = $food_edit->user->id;
        if (empty($food_edit)) {
            Flash::error('Food not found');

            return redirect(route('admin.food.index'));
        }

        return view('admin.food.edit', compact('food_edit', 'categories', 'selectCa', 'users', 'selectUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $food = Food::whereId($id)->first();
        if (empty($food)) {

            return redirect(route('admin.food.index'));
        }
        $imageName = str_random(40) . '.' .
                $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
                base_path() . '/public/img/food/', $imageName
        );
        $array = $request->all();
        unset($array['_method']);
        $array['device_token'] = $array['_token'];
        unset($array['_token']);
        $array['image'] = $imageName;
        Food::whereId($id)->update($array);
        return redirect(route('admin.food.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $food = Food::find($id);

        if (empty($food)) {
            return redirect(route('admin.food.index'));
        }
        $food->delete();

        return redirect(route('admin.food.index'));
    }

    public function search(Request $request) {

        $post = $request->all();

        $query = DB::table('food')->where([
                    ['name', 'like', '%' . $post['name'] . '%'],
                    ['email', 'like', '%' . $post['email'] . '%']
                ])->get();
        return view('admin.food.table', ['foods' => $query]);
    }

}
