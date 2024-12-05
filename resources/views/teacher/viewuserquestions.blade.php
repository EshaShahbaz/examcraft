
<div class="container">
    <h2>Questions by Chapter</h2>

    @forelse($questions as $chapterId => $chapterQuestions)
        <div class="card mb-3">
            <div class="card-header">
                <h4>Chapter: {{ $chapterQuestions->first()->chapter->chapter_name }}</h4>
                <p>Chapter No: {{ $chapterQuestions->first()->chapter->chapter_no }}</p>
            </div>
            <div class="card-body">
                <ul>
                    @foreach($chapterQuestions as $question)
                        <li>{{ $question->add_question_text }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <p>No questions found for the selected class and subject.</p>
    @endforelse
</div>





