<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Block;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory() {

        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogCategory'));

    }


    public function AddBlogCategory() {

        return view('admin.blog_category.blog_category_add');

    }


    public function StoreBlogCategory(Request $request) {

        BlogCategory::insert([

            'blog_category' => $request->blog_category

        ]);

        $notification = array(

            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);


    }

    public function EditBlogCategory($id) {

        $blogCategory = BlogCategory::find($id);

        return view('admin.blog_category.blog_category_edit', compact('blogCategory'));
     
    }


    public function UpdateBlogCategory(Request $request) {

        $blogCategory_id = $request->id;

        BlogCategory::find($blogCategory_id)->update([

            'blog_category' => $request->blog_category

        ]);

        
        $notification = array(

            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
        
    }


    public function DeleteBlogCategory($id) {

        BlogCategory::find($id)->delete();

        $notification = array(

            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }







}
