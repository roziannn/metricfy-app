<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
{

    public function index()
    { //view both user,admin, (+)guest
        $data_blog = Blog::OrderBy('updated_at', 'desc')->get();

        $blogs = [];

        foreach ($data_blog as $blog) {
            $kataCount = str_word_count(strip_tags($blog->content));
            $avrgUserReading = 300;

            $estimatedReadingTime = ceil($kataCount / $avrgUserReading);

            $blogs[] = [
                'blog' => $blog,
                'estimatedReadingTime' => $estimatedReadingTime
            ];
        }

        return view('user.blog.index', compact('data_blog', 'blogs'));
    }

    public function create()
    { //only by admin

        return view('admin.dashboard-admin.dataBlog.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:80',
            // 'slug' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $validatedData['title'] . '-' . time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('img/blog'), $thumbnailName);

            $validatedData['thumbnail'] = $thumbnailName;
        }

        Blog::create([
            'title' => $validatedData['title'],
            // 'slug' => Str::slug($validatedData['title']),
            'thumbnail' => $validatedData['thumbnail'],
            'content' => $validatedData['content'],
        ]);


        Alert::success('Berhasil!', "Berhasil menambahkan data blog!");

        return redirect('/dashboard-admin/data-blog');
    }

    public function showAdmin($slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        return view('admin.dashboard-admin.dataBlog.show', compact('blog'));
    }

    public function showUser($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $breadcrumbs = [
            'Blog' => route('blog'),
            $blog->title => ''
        ];

        //read estimated
        $kataCount = str_word_count(strip_tags($blog->content));
        $avrgUserReading = 300;

        $estimatedReadingTime = ceil($kataCount / $avrgUserReading);

        //artikel lainnya side-right list
        $viewlist = Blog::orderBy('created_at', 'asc')->limit(5)->get();

        return view('user.blog.show', compact('blog', 'breadcrumbs', 'viewlist', 'estimatedReadingTime'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $rules = ([
            'title' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
        ]);

        $validatedData = $request->validate($rules);


        $blog->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $blog->title . '-' . time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('img/blog'), $thumbnailName);

            $oldImagePath = public_path('img/blog') . '/' . $blog->thumbnail;
            if ($blog->thumbnail && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $blog->thumbnail = $thumbnailName;
            $blog->save();
        }

        Alert::success('Berhasil!', "Berhasil mengubah data blog!");
        return redirect('/dashboard-admin/data-blog');
    }

    public function delete($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->delete();


        Alert::success('Berhasil!', "Berhasil menghapus data blog!");
        return redirect('/dashboard-admin/data-blog');
    }
}
