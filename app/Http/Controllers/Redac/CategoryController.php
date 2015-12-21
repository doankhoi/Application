<?php

namespace App\Http\Controllers\Redac;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Back\CatetogoryRequest;

class CategoryController extends Controller
{
    protected $itemPerPage = 50;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('is_active', 'asc')->orderBy('created_at', 'desc')->paginate($this->itemPerPage);
        return view('redac.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('redac.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatetogoryRequest $request)
    {
        try {
            Category::create($request->all());
            $message = "Tạo chủ đề thành công.";
            $alertClass = "alert-success";
        } catch (Exception $e) {
            $message = "Tạo chủ đề lỗi.";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'))->withInput();
        }

        return redirect(route('redac.category.index'))->with(compact('message', 'alertClass'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            return view('redac.categories.edit', compact('category'));
        } catch (Exception $e) {
            $message = "Không tồn tại";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'));
        }
    }

   
    public function update(CatetogoryRequest $request, $id)
    {
        try {
            $cate = Category::findOrFail($id);
            $cate->fill($request->all());
            if($cate->save()) {
                $message = "Cập nhật thành công.";
                $alertClass = "alert-success";
            } else {
                $message = "Không thể cập nhật.";
                $alertClass = "alert-danger";
            }
        } catch (Exception $e) {
            $message = "Không thể cập nhật.";
            $alertClass = "alert-danger";
        }

        return redirect(route('redac.category.index'))->with(compact('message', 'alertClass'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Request::ajax())
        {
            $result['error'] = false;
            try{
                $cate = Category::findOrFail($id);
                $cate->delete();
                $result['error'] = false;
            } catch(Exception $e){
                $result['error'] = true;
            }

            return response()->json($result);
        }
    }

    public function publishedCate($id) 
    {

    }
}
