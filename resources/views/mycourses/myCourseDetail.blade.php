@include('partials.navbar')
@section('content')

<!-- Content -->
<div class="container my-course-detail p-5 my-5">
<h1>{{ $course->course_title }}</h1>
    <div class="card card-my-course-detail">
        <img src="{{ $course->course_thumbnail }}" alt="">
        <h2>Overview</h2>
        <p>{{ $course->course_desc }}</p>

        <h2>Videos</h2>
        @if($course->videos->isNotEmpty())
            @foreach($course->videos as $video)
                <div class="video">
                    <h3>{{ $video->video_title }}</h3>
                    <iframe width="1000" height="500" src="{{ $video->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            @endforeach
        @else
            <p>No videos available.</p>
        @endif

        <h2>Learning Module</h2>
        @if($course->pdfs->isNotEmpty())
            @foreach($course->pdfs as $pdf)
                <div class="pdf">
                    <h3>{{ $pdf->pdf_title }}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0C843C" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                    <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
                    </svg>  <a class="pdf-file" href="{{ $pdf->pdf_file_path }}" target="_blank">{{ $pdf->pdf_title }}.pdf</a>
                </div>
            @endforeach
        @else
            <p>No module available.</p>
        @endif

        <h2>Quiz</h2>
        @if($course->questions->isNotEmpty())
            @foreach($course->questions as $question)
                <div class="question">
                    <h5>{{ $question->question_text }}</h5>
                    <ul>
                        @foreach($question->options as $option)
                            <li>{{ $option }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
            <p>No quiz available.</p>
        @endif

    </div>
</div>