@include('partials.navbar')
@section('content')

<!-- Content -->
<div class="container p-5 my-5">
    <input type="hidden" id="success-message" value="{{ session('success') }}">
    <h1>Hello, {{ Auth::user()->fullname }} &#128075;</h1>
    <h2>Latest Announcement</h2>
    <div class="card-anounce">
        <div class="text-center mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#53B34B" class="bi bi-megaphone-fill" viewBox="0 0 16 16">
            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25 25 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009l.496.008a64 64 0 0 1 1.51.048m1.39 1.081q.428.032.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a66 66 0 0 1 1.692.064q.491.026.966.06"/>
            </svg>  
            <h3 class="mt-3 mb-3">No Announcement</h3>
        </div>
    </div>
    <h2>Enrollment The Courses</h2>
    <div class="card-enroll-course">
        <img src="/img/tutorial-enroll.png" class="card-img-top" alt="Course Tutorial">
    </div>

    <h2>Course Overview</h2>
    <div class="card-courses">
        @if($courses->isEmpty())
        <!-- Jika tidak ada course -->
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
                <div class="card-course-item mb-4 shadow-sm">
                    <img src="{{ $course->course_thumbnail }}" class="card-img-top" alt="{{ $course->course_title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->course_title }}</h5>
                        <p class="card-text">{{ $course->course_summary }}</p>
                      
                        <!-- Memeriksa apakah pengguna sudah terdaftar -->
                        @if($course->users->contains(Auth::user()))
                            <button class="btn btn-secondary already-button" disabled>Already Enrolled</button>
                        @else
                            <form class="btn-enroll-form" action="{{ route('courses.enroll', $course->course_code) }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-primary enroll-button" data-bs-toggle="modal" data-bs-target="#enrollModal" data-course-code="{{ $course->course_code }}">Enroll</button>
                            </form>
                        @endif         
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</>


<!-- Confirm Enroll Modal -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollModalLabel">Confirm Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Are you sure you want to enroll in this course?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-cancel-enroll" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-enroll-form" id="confirmEnrollButton">Enroll</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sukses Enroll -->
<div class="modal fade" id="successEnrollModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Enrollment Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You have successfully enrolled the course! Have a good study!
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                </svg>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Error Enroll -->
<div class="modal fade" id="errorEnrollModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Enrollment Failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You are already enrolled this course.
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                </svg>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal JS-->
<script src="{{ asset('/js/errorEnrollModal.js') }}"></script>
<script src="{{ asset('/js/successEnrollModal.js') }}"></script>
<script src="{{ asset('/js/confirmEnrollModal.js') }}"></script>
