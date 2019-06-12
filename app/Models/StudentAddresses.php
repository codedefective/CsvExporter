<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    
    class StudentAddresses extends Model{
        protected $table = 'student_address';
    
        public function students()
        {
            return $this->hasMany(Students::class);
        }
    }
