@extends('layouts.task')
@section('content')

    @include('layouts.buttons')

    <form id="studentsForm" method="post" action="{{route('exportStudents')}}">
        @csrf
        <div class="text-center" style='margin: 10px'>
            <table class="student-table">
                <tr>
                    <th></th>
                    <th><a href="{{route('studentOrder', ['order'=> 'forename'])}}" class="text-white">Forename</a></th>
                    <th><a href="{{route('studentOrder', ['order'=> 'surname'])}}" class="text-white">Surname</a></th>
                    <th><a href="{{route('studentOrder', ['order'=> 'email'])}}" class="text-white">Email</a></th>
                    <th><a href="{{route('studentOrder', ['order'=> 'university'])}}" class="text-white">University</a>
                    </th>
                    <th><a href="{{route('studentOrder', ['order'=> 'course'])}}" class="text-white">Course</a></th>
                </tr>

                @if(  count($students) > 0 )
                    @foreach($students as $student)
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
                @else
                    <tr>
                        <td colspan="6" style="text-align: center">Oh dear, no data found.</td>
                    </tr>
                @endif
            </table>
        </div>

    </form>
@endsection

