@include('partials.navbar')
@section('content')

<!-- Content -->
<div class="container p-5 my-5">
    <h1>{{ $title }}</h1>
    <div class="card-mycourses">
        @if($courses->isEmpty())
            <div class="text-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#53B34B" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                </svg>
                <h3 class="mt-3 mb-3">No Courses</h3>
            </div>
        @else
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-4">
                        <div class="card-mycourses-item mb-4 shadow-sm">
                            <img src="{{ $course->course_thumbnail }}" class="card-img-top" alt="{{ $course->course_title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_title }}</h5>
                                <p class="card-text">{{ $course->course_summary }}</p>
                                <a href="{{ route('course.detail', ['courseCode' => $course->course_code]) }}" class="btn btn-primary study-button">Study</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>