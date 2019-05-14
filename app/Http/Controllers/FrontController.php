<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Reviews;
use App\Views;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    public function get_all_news()
    {
       $news= News::orderby('created_at', 'desc')->where('active',1)->paginate(5);
       return view('front.pages.home')->withNews($news);

    }
     public function Show_new($slug)
    {
        $new = News::select(['id','title','slug','content',
            'image','created_at'])->where('slug',$slug)->first();

        $id = DB::table('views')->where('id_new', $new->id)->first();
        if(!$id)
        {
            $view = new Views();
            $view->id_new = $new->id;
            $view->count_views = 1;
            $view->save();
            $all_views = 1;
        }
        else{
            $count = Views::select('count_views')->where('id_new',$id->id_new)->first();
            $view = Views::find($id->id);
            $all_views = ++$count->count_views;
            $view->count_views = $all_views ;
            $view->save();
        }

        return view('front.pages.show_new')->with([
            'new' => $new,
            'all_views' => $all_views
        ]);
    }

    public function get_all_reviews()
    {
        $reviews = Reviews::orderby('created_at', 'desc')->where('status',1)->paginate(5);
        if($reviews->total() == 0)
        {
            $reviews = [];
        }
        return view('front.pages.reviews.index')->with(['reviews' =>$reviews]);
    }

    public function sort()
    {
        $sortdata = '';
        if(isset($_GET['request']) && $_GET['request'])
        $sortdata = $_GET['request'];

        if ($sortdata != null)
        setcookie('request',$sortdata, time() + (86400 * 30), "/");
        else
        {
            $sortdata = $_COOKIE['request'];
        }

        switch ($sortdata) {
            case 'DataDESC':
                $news= News::orderby('created_at', 'desc')->where('active',1)->paginate(6);
                break;
            case 'DataASC':
                $news= News::orderby('created_at', 'asc')->where('active',1)->paginate(6);
                break;
            case 'RatingDESC':
                $news = DB::table('news')
                    ->join('views', 'news.id', '=', 'views.id_new')
                    ->select('news.*', 'views.count_views')
                    ->orderby('views.count_views', 'desc')
                    ->paginate(6);
                break;
            case 'RatingASC':
                $news = DB::table('news')
                    ->join('views', 'news.id', '=', 'views.id_new')
                    ->select('news.*', 'views.count_views')
                    ->orderby('views.count_views', 'asc')
                    ->paginate(6);
                break;
        }
        return view('front.pages.home')->withNews($news);
    }
    public function bigger_to_smaller($a, $b)
    {
        if ($a->count_views == $b->count_views) {
            return 0;
        }
        return ($a->count_views > $b->count_views) ? -1 : 1;
    }

    public function smaller_to_bigger($a, $b)
    {
        if ($a->count_views == $b->count_views) {
            return 0;
        }
        return ($a->count_views > $b->count_views) ? 1 : -1;
    }

}
