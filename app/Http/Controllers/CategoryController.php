<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::all();


        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request) {
        $category = new Category();
        $array = $request->all();

        $imageName =  str_random(40) .'.'.
                $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
                base_path() . '/public/img/category/', $imageName
        );
        $array['image'] = $imageName;
       Category::create($array);
        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $category = Category::whereId($id)->first();
        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('admin.category.index'));
        }
        return view('admin.category.show',[
            'category'=> $category,
            'folder' => "category",
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category_edit = Category::whereId($id)->first();

        if (empty($category_edit)) {
            Flash::error('Category not found');

            return redirect(route('admin.category.index'));
        }

        return view('admin.category.edit')->with('category_edit', $category_edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $category = Category::whereId($id)->first();

        if (empty($category)) {

            return redirect(route('admin.category.index'));
        }

        $imageName =  str_random(40) .'.'.
                $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
                base_path() . '/public/img/category/', $imageName
        );
       $array = $request->all();
        unset($array['_method']);
        unset($array['_token']);
        $array['image'] = $imageName;
        Category::whereId($id)->update($array);
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $category = Category::find($id);

        if (empty($category)) {
//            Flash::error('User not found');

            return redirect(route('admin.category.index'));
        }
        $category->delete();

        return redirect(route('admin.category.index'));
    }

    public function search(Request $request) {

        $post = $request->all();

        $query = DB::table('category')->where([
                    ['name', 'like', '%' . $post['name'] . '%'],
                    ['email', 'like', '%' . $post['email'] . '%']
                ])->get();
        return view('admin.category.table', ['categories' => $query]);
    }

}
