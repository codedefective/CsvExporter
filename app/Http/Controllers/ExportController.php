<?php
    
    namespace App\Http\Controllers;
    
    use App\Http\Requests\ExportCourseRequest;
    use App\Http\Requests\ExportStudentRequest;
    use App\Models\Course;
    use App\Models\Students;
    use Illuminate\Support\Facades\Route;

    class ExportController extends Controller{
        public function __construct(){
        
        }
        
        public function welcome(){
            return view('hello');
        }
        
        public function index(){
            return view('index');
        }
        
        /**
         * View all students found in the database
         */
        public function viewStudents(){
            $students = Students::with('course')
                                ->get();
            $order   = Route::current()
                            ->parameter('order');
            if($order === 'forename'){
                $students = $students->sortBy('firstname');
            }
            if($order === 'surname'){
                $students = $students->sortBy('surname');
            }
             if($order === 'email'){
                $students = $students->sortBy('email');
            }
            if($order === 'university'){
                $students = $students->sortBy('course.university');
            }
            if($order === 'course'){
                $students = $students->sortBy('course.course_name');
            }
            return view('view_students', ['students' => $students]);
        }
        public function viewStudentDetail($id){
            $student = Students::where('id', $id)->with('course')->with('address')->first();
            if(!$student){
                return view('view_student_detail')->with('message', 'No Such Student');
            }
            return view('view_student_detail',['student' => $student]);
        }
        public function exportStudentsToCSV(ExportStudentRequest $request){
            
            
            $data     = $request->input('studentId');
            $students = Students::with('course')
                                ->whereIn('id', $data)
                                ->get();
            if($students->count() === 0){
                return redirect()->route('students');
            }
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename=students-' . date('Y-m-d-') . '.csv');
            header('Pragma: no-cache');
            header('Expires: 0');
            $out = fopen('php://output', 'wb');
            fputcsv($out, [
                'Forename',
                'Surname',
                'Email',
                'University',
                'Course'
            ]);
            foreach($students as $student){
                $sData = [
                    $student->firstname,
                    $student->surname,
                    $student->email,
                    $student->course['university'],
                    $student->course['course_name']
                ];
                fputcsv($out, $sData);
            }
            fclose($out);
        }
        
        public function viewCourses(){
            $courses = Course::with('students')
                             ->get();
            $order   = Route::current()
                            ->parameter('order');
            if($order === 'cname'){
                $courses = $courses->sortBy('course_name');
            }
            if($order === 'uni'){
                $courses = $courses->sortBy('university');
            }
            if($order === 'totals'){
                $courses = $courses->sortByDesc('students');
            }
            return view('view_courses', ['courses' => $courses]);
        }
        public function viewCourseDetail($id){
            $course = Course::where('id', $id)->with('students')->first();
            if(!$course){
                return view('view_course_detail')->with('message', 'No Such Course');
            }
            return view('view_course_detail',['course' => $course]);
        }
        /**
         * Exports the total amount of students that are taking each course to a CSV file
         */
        public function exportCourseAttendanceToCSV(ExportCourseRequest $request){
            $data     = $request->input('courseId');
            $courses = Course::whereIn('id', $data)
                                ->get();
            if($courses->count() === 0){
                return redirect()->route('courses');
            }
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename=courses-' . date('Y-m-d-') . '.csv');
            header('Pragma: no-cache');
            header('Expires: 0');
            $out = fopen('php://output', 'wb');
            fputcsv($out, [
                'Course Name',
                'University',
                'Total Students'
            ]);
            foreach($courses as $course){
                $cData = [
                    $course->course_name,
                    $course->university,
                    count($course->students)
                ];
                fputcsv($out, $cData);
            }
            fclose($out);
        }
    }
