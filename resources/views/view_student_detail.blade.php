@extends('layouts.task')
@section('content')

    @if(!empty($message))
        <div class="c-full">
            <span class="alert">{{$message}}</span>
        </div>
    @else
        <div class="c-full text-left">
            <div class="block font-normalize medium-block">
                Name: {{$student->firstname}} {{$student->surname}}<br>
                Elmail: {{$student->email}} <br>
                Nationality: {{$student->nationality}}<br>
                University: {{$student->course['university']}}<br>
                Curse: {{$student->course['course_name']}}
            </div>

            <div class="block font-normalize medium-block">
                <strong>Address</strong> <br>
                {{$student->address['line_1']}} {{$student->address['line_2']}}<br>
                {{$student->address['postcode']}} {{$student->address['city']}}
            </div>





        </div>
    @endif


@endsection

