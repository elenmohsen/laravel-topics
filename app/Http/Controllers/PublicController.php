<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicController extends Controller
{
    public function index(){
      $categories = Category::with(['topics'=>function($query){ $query->where('published', 1)->take(3);}])->limit(5)->get();
    // dd($categories);
    $topics = Topic::where('published', '=', 1)
    ->orderBy('no_of_views', 'desc')
    ->limit(2)
    ->get();
     // $topics = Topic::where('published','=',1)->orderby('id','desc')->limit(2)->get();
      $testimonials = Testimonial::where('published','=',1)->orderby('id','desc')->limit(3)->get();
        return view('public.index', compact(array('testimonials', 'topics', 'categories')));
     }

   public function contact(){
        return view('public.contactus');
     }

     public function testimonials(){
        $testimonials = Testimonial::where('published','=',1)->get();
        return view('public.testimonials', compact('testimonials'));
     }

     public function topicsdetail(string $id){
        $topic= Topic::where('published', '=', 1)->find($id);
        $topic->no_of_views++;
        $topic->save();
        return view('public.topics_detail' ,compact('topic'));
     }

     public function topicslisting(){
   
        $trendingTopics = Topic::where('trending', 1)
                               ->where('published', 1)
                               ->orderBy('id', 'desc')
                               ->limit(2)
                               ->get();

     $topics = Topic::where('published', 1)
                       ->orderBy('id', 'desc')
                       ->get()->toQuery()->paginate(3);

                   /*    $topics = Topic::
                       paginate(2); */

         return view('public.topics_listing', compact('topics', 'trendingTopics'));
     }

}
