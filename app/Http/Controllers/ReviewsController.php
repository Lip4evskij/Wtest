<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviews;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Reviews::orderby('created_at', 'desc')->paginate(5);
        return view('admin.pages.reviews.index')->with(['reviews'=>$reviews]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.pages.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request_capthca = $_POST['g-recaptcha-response'];
        if(isset($request_capthca) && $request_capthca) {
            $secret = '6LdbUqMUAAAAAEuPxzovFujSAp1Ld-xGCzqyKGQw';
            $ip = $_SERVER['REMOTE_ADDR'];
            $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$request_capthca&remoteip=$ip");
            $arr = json_decode($rsp, TRUE);
            if(!$arr['success'])
            {
                $request->session()->flash('error_extension', 'Неверная CAPTCHA');
                return redirect()->back();
            }
            else
            {
                $reviews = new Reviews();
                $reviews->name = $request->name;
                $reviews->email = $request->email;
                $reviews->text = $request->text;
                $reviews->status = 0;
                if($reviews->name && $reviews->email && $reviews->text)
                $reviews->save();
                else
                {
                    $request->session()->flash('error_extension', 'Заполните все поля');
                    return redirect()->back();
                }
                $request->session()->flash('success', 'Отзыв добавлен! Он появиться после одобрения администратором');
            }
        }

        return redirect('/all-reviews');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Reviews::find($id);
        return view('admin.pages.reviews.edit')->withReview($review);
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
        $reviews = Reviews::find($id);
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->text = $request->text;
        if($request->check_active)
            $reviews->status = (int)$request->check_active;
        else
            $reviews->status = 0;
        if($reviews->name && $reviews->email && $reviews->text)
            $reviews->save();
        else
        {
            $request->session()->flash('error_extension', 'Заполните все поля');
            return redirect()->back();
        }
        $request->session()->flash('success', 'Отзыв изменен');
        return redirect()->route('reviews.index');
    }
    public function destroy($id)
    {

        if($id)
        {
            $review =  Reviews::find($id);
            if($review)
                $review->delete();

        }
        return redirect()->route('reviews.index');
    }

}
