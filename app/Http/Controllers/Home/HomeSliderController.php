<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\HomeSlide;


class HomeSliderController extends Controller
{
    
    public function HomeSlider() {

        $homeSlide = HomeSlide::find(1);

        return view('admin.home_slide.home_slide_all', compact('homeSlide'));

    }

    public function UpdateSlider(Request $request) {

        $slide_id = $request->id;

        if($request->file('home_slide')) {

            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        
            Image::make($image)->resize(658, 545)->save(public_path('upload/home_slide/'. $name_gen));
            $save_url = $name_gen;

            HomeSlide::findOrFail($slide_id)->update([

                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,

            ]);

            $notification = array (

                'message' => 'Home Slide Updated with Image Successfully', 
                'alert-type' => 'success'
            );
        
        return redirect()->back()->with($notification);    
        
        } else {

            HomeSlide::findOrFail($slide_id)->update([

                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);

            $notification = array (

                'message' => 'Home Slide Updated without Image Successfully', 
                'alert-type' => 'success'
            );

         return redirect()->back()->with($notification);     

        }
    
    } 



}    


