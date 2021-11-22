<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Course;
use App\Models\Category;
use App\Traits\UploadFiles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use UploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('home.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('home.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:5|max:100',
            'user_id' => 'required|integer',
            'description' => 'nullable|min:5',
            'objectives' => 'nullable|min:5',
            'price' => 'nullable|integer',
            'total_videos' => 'nullable|integer',
            'duration' => 'nullable|max:100',
            'channel_id' => 'nullable|integer|exists:App\Channel,id',
            'category_id' => 'nullable|integer'
        ]);

        // dd($request->all());
        $course = Course::create($request->only(['title',
            'description',
            'objectives',
            'price',
            'total_videos',
            'duration',
            'channel_id',
            'user_id',
            'category_id'
        ]));

        if ($filePath = $this->handleImageUpload($request, $course)){
                $course->save();
        }

        return redirect()->to('/courses')->with(['message' => 'Curso adicionado com sucesso']);
    }

    private function handleImageUpload(Request $request, Course $course){

        // Check if a profile image has been uploaded
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/courses/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadImage($image, $folder, 'public', $name);

            // // Apagar a imagem que estava associada ao usuario anteriormente
            if($course->image) {
                $this->deleteImage($folder, 'public', explode('/', $course->image)[3]);
            }

            // Set user profile image path in database to filePath
            return $filePath;

        } else{
            return null;
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
