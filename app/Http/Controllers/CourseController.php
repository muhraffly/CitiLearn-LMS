<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $courses = Course::all();

    return view('mycourses.indexMycourses', [
        'courses' => $courses,
        'title' => 'My Courses'
    ]);
    }

    public function enroll(Request $request, $courseCode)
    {
        $user = Auth::user();
    
        // Cari course berdasarkan kode course
        $course = Course::where('course_code', $courseCode)->firstOrFail();
    
        // Cek apakah user sudah terdaftar di course ini
        if ($course->users()->where('users_courses.user_id', $user->user_id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled this course.');
        }
    
        // Enroll user ke course
        $course->users()->attach($user->user_id, [
            'course_code' => $courseCode,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        return redirect()->route('dashboard')->with('success', 'You have successfully enrolled the course.');
    }

    public function enrolled_courses()
    {
        $user = Auth::user();
        $courses = $user->courses;

        return view('mycourses.indexMycourses', [
            'title' => 'My Courses',
            'courses' => $courses,
        ]);
    }

    public function course_detail($courseCode)
        {
            $course = Course::with(['videos', 'pdfs', 'questions'])->findOrFail($courseCode);

            $title = $course->course_title;

            // Kirim $course dan $title ke view
            return view('mycourses.myCourseDetail', [
                'course' => $course,
                'title' => $course->course_title,
            ]);  
        }
}
