<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;
use App\Views;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news= News::orderby('created_at', 'desc')->paginate(5);
        return view('admin.pages.news.index')->withNews($news);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news =  new News();
        $news->title = $request->title;
        $slug = DB::table('news')->where('slug', str_slug($request->title, '-'))->first();
        if($slug)
        {
            $request->session()->flash('error_extension', 'Такой заголовок уже существует');
            return redirect()->back();
        }
        else
        {
            $news->slug = str_slug($request->title, '-');
        }

        $news->content = $request->content;
        if($request->check_active)
        $news->active = (int)$request->check_active;
        else
            $news->active = 0;
        if($request->hasFile('image'))
        {
            $extension = ['jpg', 'jpeg', 'png','raw', 'tiff'];
            $image_file = $request->file('image');
            if(in_array($image_file->getClientOriginalExtension(),$extension))
            {
                $input['imagename'] = time().'.'.$image_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/images');
                $news->image = 'uploads/images/'.$input['imagename'];
                $image_file->move($destinationPath, $input['imagename']);
            }
            else
            {
                $request->session()->flash('error_extension', 'Неверный формат изображения!');
                return redirect()->back();
            }

        }
        if((isset($news->title) && $news->title) && (isset($news->slug) && $news->slug) && (isset($news->content) && $news->content))
        {
            $news->save();
        }
        if($news->save())
        {
            $slug = DB::table('news')->where('slug', str_slug($request->title, '-'))->first();
            $views = new Views();
            $views->id_new = $slug->id;
            $views->count_views = 0;
            $views->save();
            $request->session()->flash('success', 'Новость добавлена');
        }


        return redirect()->route('admin-panel.show', $news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('admin.pages.news.show')->withNews($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.pages.news.edit')->withNews($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news =  News::find($id);
        $news->title = $request->title;
        $news->slug = str_slug($request->title, '-');

        $news->content = $request->content;
        if($request->check_active)
            $news->active = (int)$request->check_active;
        else
            $news->active = 0;
        if($request->hasFile('image'))
        {
            $extension = ['jpg', 'jpeg', 'png','raw', 'tiff'];
            $image_file = $request->file('image');
            if(in_array($image_file->getClientOriginalExtension(),$extension))
            {
                $input['imagename'] = time().'.'.$image_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/images');
                $news->image = 'uploads/images/'.$input['imagename'];
                $image_file->move($destinationPath, $input['imagename']);
            }
            else
            {
                $request->session()->flash('error_extension', 'Неверный формат изображения!');
                return redirect()->back();
            }

        }
        if((isset($news->title) && $news->title) && (isset($news->slug) && $news->slug) && (isset($news->content) && $news->content))
        {
            $news->save();
        }
        if($news->save())
        {
            $request->session()->flash('success', 'Новость изменена');
        }
        return redirect()->route('admin-panel.show', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if($id)
        {
            $news =  News::find($id);
            if($news)
            $news->delete();
        }
        return redirect()->route('admin-panel.index');
    }
}
