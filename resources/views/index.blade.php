@extends('layouts.task')
@section('content')
    <div class="c-full">
       <a href="{{route('students')}}" class="block">Students</a>
       <a href="{{route('courses')}}" class="block">Courses</a>
    </div>
@endsection