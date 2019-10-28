<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UPdateCategoryRequest;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
//        dd(request()->all());
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.newcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        //dd(request()->all());
        //перенесено в CreateCategoryRequest
        /**$this->validate(request(),[
            'name'=>'required|unique:categories|min:6|max:50'
        ]);
         **/

        Category::create(
            [
                "name"=>$request->name
            ]
        );
        /**Можно так
        $data = request()->all();
        $category = new Category();
        $category ->name = $data['name'];
        $category ->save();
         **/
        session()->flash('success', 'Category created successfully');
        return redirect( route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//        return view('categories.editcategory') ->with('category', $category);
        return view('categories.newcategory') ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UPdateCategoryRequest $request, Category $category)
    {
//  dd(request()->all());
        //перенесли это в UpdateCategoryRequest
        /**
        $this->validate(request(),[
            'name'=>'required|min:6|max:50'
        ]);
         **/

      //  $data = request()->all();
        //$todo = Todo::find($todoId);

/**        $category->name = $request->name;
        $category->save();
**/
    $category ->update(
      [
          'name' =>$request->name
      ]
    );

        session()->flash('success', 'Category updated successfully');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        session()->flash('success','Category deleted successfully');

        return redirect('/categories.index');
    }
}
