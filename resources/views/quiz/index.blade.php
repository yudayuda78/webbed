<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('submit-quiz') }}" method="post">
        @csrf
        <h2>Quiz</h2>

        @foreach ($quizzes as $index => $quiz)
            <!-- Pertanyaan 1 -->
            <fieldset>
                <legend>{{ $quiz->pertanyaan }}</legend>
                <label><input type="radio" name="question{{ $index + 1 }}" value="a">
                    {{ $quiz->a }}</label>
                <label><input type="radio" name="question{{ $index + 1 }}" value="b">
                    {{ $quiz->b }}</label>
                <label><input type="radio" name="question{{ $index + 1 }}" value="c">
                    {{ $quiz->c }}</label>
                <label><input type="radio" name="question{{ $index + 1 }}" value="d">
                    {{ $quiz->d }}</label>
            </fieldset>
            <br>
        @endforeach

        <button type="submit">Submit</button>
    </form>
</body>

</html>
