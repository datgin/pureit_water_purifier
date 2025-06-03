<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ConfigController extends Controller
{
    public function index()
    {
        //
        $config = Config::firstOrCreate();
        return view('backend.config.index', compact('config'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = uploadImages('logo', 'logo');
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = uploadImages('icon', 'icon');
        }

        $config = Config::first();

        $config->update($data);

        session()->flash('success', 'Lưu thay đổi thành công.');

        return redirect()->back();
    }

    public function slider()
    {
        $sliders = Slider::orderBy('stt')->get();
        return view('backend.config.slider', compact('sliders'));
    }

    public function sliderUpdate(Request $request)
    {
        $alts = $request->input('alt');
        $links = $request->input('link');
        $images = $request->file('image');
        $old_images = $request->input('old_image');
        $slider_ids = $request->input('slider_id') ?? [];


        $currentIds = Slider::pluck('id')->toArray();


        $formIds = array_filter($slider_ids, fn($id) => !empty($id));


        $deletedIds = array_diff($currentIds, $formIds);


        foreach ($deletedIds as $delId) {
            $slider = Slider::find($delId);
            if ($slider) {

                if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
                    unlink(public_path('storage/' . $slider->image));
                }
                $slider->delete();
            }
        }

        $count = count($alts);
        $maxStt = Slider::max('stt') ?? 0;

        for ($i = 0; $i < $count; $i++) {
            $slider = null;


            if (!empty($slider_ids[$i])) {
                $slider = Slider::find($slider_ids[$i]);
                if (!$slider) {

                    $slider = new Slider();
                }
            } else {

                $slider = new Slider();
            }

            $slider->alt = $alts[$i];
            $slider->link = $links[$i];
            $slider->stt = $i + 1;


            if (isset($images[$i])) {
                $image = $images[$i];
                $filename = time() . '_' . $image->getClientOriginalName();

                $destinationPath = public_path('storage/sliders');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }


                if (!empty($slider->image) && file_exists(public_path('storage/' . $slider->image))) {
                    unlink(public_path('storage/' . $slider->image));
                }

                $image->move($destinationPath, $filename);
                $slider->image = 'sliders/' . $filename;
            } else {

                if (!empty($old_images[$i])) {
                    $slider->image = $old_images[$i];
                } else {

                    $slider->image = null;
                }
            }

            $slider->save();
        }

        return redirect()->back()->with('success', 'Cập nhật slider thành công!');
    }
}
