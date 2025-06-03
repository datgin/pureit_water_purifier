<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $aboutus = AboutUs::get();
        return view('backend.about-us.index', compact('aboutus'));
    }

    public function store(Request $request)
    {
        $titles = $request->input('title');
        $descriptions = $request->input('description');
        $images = $request->file('image');
        $old_images = $request->input('old_image');
        $aboutUs_ids = $request->input('aboutUs_id') ?? [];


        $currentIds = AboutUs::pluck('id')->toArray();


        $formIds = array_filter($aboutUs_ids, fn ($id) => !empty($id));


        $deletedIds = array_diff($currentIds, $formIds);


        foreach ($deletedIds as $delId) {
            $aboutUs = AboutUs::find($delId);
            if ($aboutUs) {

                if ($aboutUs->image && file_exists(public_path('storage/' . $aboutUs->image))) {
                    unlink(public_path('storage/' . $aboutUs->image));
                }
                $aboutUs->delete();
            }
        }

        $count = count($titles);

        for ($i = 0; $i < $count; $i++) {
            $aboutUs = null;


            if (!empty($aboutUs_ids[$i])) {
                $aboutUs = AboutUs::find($aboutUs_ids[$i]);
                if (!$aboutUs) {

                    $aboutUs = new AboutUs();
                }
            } else {

                $aboutUs = new AboutUs();
            }

            $aboutUs->title = $titles[$i];
            $aboutUs->description = $descriptions[$i];



            if (isset($images[$i])) {
                $image = $images[$i];
                $filename = time() . '_' . $image->getClientOriginalName();

                $destinationPath = public_path('storage/aboutUs');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }


                if (!empty($aboutUs->image) && file_exists(public_path('storage/' . $aboutUs->image))) {
                    unlink(public_path('storage/' . $aboutUs->image));
                }

                $image->move($destinationPath, $filename);
                $aboutUs->image = 'aboutUs/' . $filename;
            } else {

                if (!empty($old_images[$i])) {
                    $aboutUs->image = $old_images[$i];
                } else {

                    $aboutUs->image = null;
                }
            }

            $aboutUs->save();
        }

        return redirect()->back()->with('success', 'Cập nhật  thành công!');
    }
}
