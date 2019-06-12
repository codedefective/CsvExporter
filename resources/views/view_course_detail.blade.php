@extends('layouts.task')

@section('content')

    <div class="c-full {{count($course->students) > 0 ? 'fit-content' : ''}} text-left">
        <div class="block font-normalize medium-block">
            <h3 class="title">Course Name</h3>
            <span>{{$course->course_name}}</span>
        </div>

        <div class="block font-normalize medium-block">
            <h3 class="title">Total Students</h3>
            <span>{{count($course->students)}}</span>
        </div>

    </div>
    <div class="fit-content text-left">
        @if(  count($course->students) > 0 )
            @include('layouts.buttons')
            <form id="studentsForm" method="post" action="{{route('exportStudents')}}">
                @csrf
                <table class="student-table">
                    <tr>
                        <th></th>
                        <th><a href="{{route('studentOrder', ['order'=> 'forename'])}}" class="text-white">Forename</a>
                        </th>
                        <th><a href="{{route('studentOrder', ['order'=> 'surname'])}}" class="text-white">Surname</a>
                        </th>
                        <th><a href="{{route('studentOrder', ['order'=> 'email'])}}" class="text-white">Email</a></th>
                        <th>
                            <a href="{{route('studentOrder', ['order'=> 'university'])}}" class="text-white">University</a>
                        </th>
                        <th><a href="{{route('studentOrder', ['order'=> 'course'])}}" class="text-white">Course</a></th>
                    </tr>
                    @foreach($course->students as $student)
                        <tr>
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" name="studentId[]" value="{{$student->id}}" />
                                    <span class="control__indicator"></span>
                                </label>
                            </td>
                            <td style=' text-align: left;'>
                                <a href="{{route('studentDetail', ['id' => $student->id])}}">
                                    {{$student->firstname}}
                                </a>
                            </td>
                            <td style=' text-align: left;'>{{$student->surname}}</td>
                            <td style=' text-align: left;'>{{$student->email}}</td>
                            <td style=' text-align: left;'>{{$student->course['university']}}</td>
                            <td style=' text-align: left;'>{{$student->course['course_name']}}</td>
                        </tr>
                    @endforeach
                </table>
            </form>
        @else
        @endif
    </div>
@endsection