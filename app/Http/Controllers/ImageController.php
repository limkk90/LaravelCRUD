<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $images = DB::table('images')->paginate(1);
//        dump($images);

//        원래쓰던 db all()
        $images = Image::all();

        return Inertia::render('Image/Index', ['images'=>$images]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Image/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'image'
        ]);
        dump($request);
//        Image Path 구해오는방법
        $path = $request->file('avatar')->store('avatars', 'public');
        Image::create([
            'title' => $request->get('title'),
            'price' => $request->get('price'),
            'image' => $path,
        ]);
        //$request->get('title'),
        //$request->get('price'),
        // Index.vue에서 <jet-input>에 id로 적어준 것임
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
        return Inertia::render('Image/Show', ['images'=>$image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
        return Inertia::render('Image/ImageEdit', ['image'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
//        dump($image->getAttribute('image'));
        dump($request->get('title'));
        dump($request->get('price'));
        dump($request->file('avatar'));
        dump($request);

//라라벨은 이렇게 getAttribute하는듯
//        Storage::delete($image->getAttribute('image'));

        $path = $request->file('avatar')->store('avatars', 'public');
//        터지면 여기서 부터 주석
        Image::update([
            'title' => $request->get('title'),
            'price' => $request->get('price'),
            'image' => $path,
        ]);
        return Redirect::route('image.index');
//        이까지
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
        Storage::delete($image->getAttribute('image'));
        $image->delete();
        return Redirect::route('image.index');
    }
}
