@extends('layouts.task')
@section('content')

    @include('layouts.buttons')

    <form id="studentsForm" method="post" action="{{route('exportCourses')}}">
        @csrf
        <div style='margin: 10px; text-align: center;'>
            <table class="student-table">
                <tr>
                    <th></th>
                    <th><a href="{{route('courseOrder', ['order'=> 'cname'])}}" class="text-white">Course Name</a></th>
                    <th><a href="{{route('courseOrder', ['order'=> 'uni'])}}" class="text-white">University</a></th>
                    <th class="text-center">
                        <a href="{{route('courseOrder', ['order'=> 'totals'])}}" class="text-white">Total Students</a>
                    </th>
                </tr>

                @if(  count($courses) > 0 )
                    @foreach($courses as $course)
                        <tr>
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" name="courseId[]" value="{{$course->id}}" />
                                    <span class="control__indicator"></span>
                                </label>
                            </td>
                            <td class="text-left">
                                <a href="{{route('courseDetail',['id'=> $course->id])}}">{{$course->course_name}}</a>
                            </td>
                            <td class="text-left">{{$course->university}}</td>
                            <td class="text-center">{{count($course->students)}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Oh dear, no data found.</td>
                    </tr>
                @endif
            </table>
        </div>

    </form>
@endsection
