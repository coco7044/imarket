<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class ImageController extends Controller
{
    //ログインしているか認証確認
    public function __construct()
    {
        //adminでログインしているか確認
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $images = Image::orderByDesc('updated_at')->paginate(20);
        return view('admin.images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
                $fileNameToStore = ImageService::upload($imageFile, 'products');    
                Image::create([
                    'filename' => $fileNameToStore  
                ]);
            }
        }

        return redirect()
        ->route('admin.images.index')
        ->with(['message' => '画像登録を実施しました。',
        'status' => 'info']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::findOrFail($id);
        return view('admin.images.edit', compact('image'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string|max:50'
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()
        ->route('admin.images.index')
        ->with(['message' => '画像情報を更新しました。',
        'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
