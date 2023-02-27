<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use LaravelLocalization;
use App\Helpers\ImageSaver;

class SliderController extends Controller
{
	private $imageSaver;
	
	public function __construct(ImageSaver $imageSaver)
		{
			$this->imageSaver = $imageSaver;
			
			$this->authorizeResource(Slider::class, 'slider');
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$sliders = Slider::where('language', LaravelLocalization::getCurrentLocale())->get();
		return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
				return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //
				        $data = $request->safe()->all();
						
						$images = [];
						$requestImage = $request->file('background');
						if($requestImage){
						$images['background'] = $this->imageSaver->upload($requestImage, null, 'home-slider');
						}
						else $images['background'] = 'slider-bg4.jpg';
						
						$requestImage = $request->file('slide');
						if ($requestImage){
						$images['slide'] = $this->imageSaver->upload($requestImage, null, 'home-slider');
						}
						else $images['slide'] = 'slide1.png';
						
				$data['images'] = $images;
				
        $slider = Slider::create($data);
			    session()->flash('message', trans('home-slider/flash.store'));
        return redirect()->route('admin.sliders.edit', ['slider' => $slider->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
				return view('admin.sliders.edit', compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        //
						        $data = $request->safe()->all();
						
						$images = [];
						$requestImage = $request->file('background');
						if ($requestImage){
						$images['background'] = $this->imageSaver->upload($requestImage, $slider->images['background'], 'home-slider');
						}
						else{
							$images['background'] = $slider->images['background'];
						}
						
												$requestImage = $request->file('slide');
						if ($requestImage){
						$images['slide'] = $this->imageSaver->upload($requestImage, $slider->images['slide'], 'home-slider');
						}
else $images['slide'] = $slider->images['slide'];
						
				$data['images'] = $images;
				

$slider->update($data);
session()->flash('message', trans('home-slider/flash.update'));
return redirect()->route('admin.sliders.edit', ['slider' => $slider->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
		$slider->delete();

		session()->flash('message', trans('home-slider/flash.delete'));
		return redirect()->route('admin.sliders.index');
    }
}
