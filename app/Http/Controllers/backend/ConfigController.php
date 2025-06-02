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
        $config = Config::first() ?? [];
        return view('backend.config.company', compact('config'));
    }

    public function seo()
    {

        $config = Config::first() ?? [];
        return view('backend.config.seo', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('storage/config_logo');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $logo = 'config_logo/' . $filename;
            $data['logo'] = $logo;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('storage/config_icon');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $icon = 'config_icon/' . $filename;
            $data['icon'] = $icon;
        }


        $config = Config::first();

        $old = $request->input('old', []);


        $existingImages = $config ? json_decode($config->slider, true) : [];

        $imagesToKeep = [];

        if (is_array($existingImages)) {

            $keepIndexes = array_map(fn ($item) => (int)$item - 1, $old);

            foreach ($existingImages as $index => $imgPath) {
                if (in_array($index, $keepIndexes)) {
                    $imagesToKeep[] = $imgPath;
                } else {

                    $fullPath = public_path($imgPath);
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('storage/slider');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);

                $imagesToKeep[] = 'slider/' . $filename;
            }
        }

        $data['slider'] = json_encode($imagesToKeep, JSON_UNESCAPED_SLASHES);


        $data['company']    = $request->company;
        $data['email']      = $request->email;
        $data['address']    = $request->address;
        $data['hotline']    = $request->hotline;
        $data['hotline_kinhdoanh'] = $request->hotline_kinhdoanh;
        $data['hotline_baotri'] = $request->hotline_baotri;
        $data['mst']        = $request->mst;
        $data['stk']        = $request->stk;
        $data['ttk']        = $request->ttk;
        $data['bank']        = $request->bank;
        $data['branch']        = $request->branch;
        $data['facebook_link']        = $request->facebook_link;
        $data['youtube_link']         = $request->youtube_link;
        $data['ig_link']         = $request->ig_link;
        $data['footer']     = $request->footer;


        Config::updateOrCreate(
            ['id' => optional($config)->id],
            $data
        );


        return redirect()->back();
    }

    public function storeSeo(Request $request)
    {
        // dd($request->all());


        $data['title_seo']    = $request->title_seo;
        $data['keyword_seo']      = $request->keyword_seo;
        $data['description_seo']    = $request->description_seo;

        $config = Config::first();

        Config::updateOrCreate(
            ['id' => optional($config)->id],
            $data
        );

        return redirect()->back();
    }



    /**
     * Display the specified resource.
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Config $config)
    {
        //
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
        $slider_ids = $request->input('slider_id');


        $currentIds = Slider::pluck('id')->toArray();


        $formIds = array_filter($slider_ids, fn ($id) => !empty($id));


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
