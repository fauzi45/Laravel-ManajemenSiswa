<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ["nama_depan","nama_belakang","tanggal_lahir","kelamin","usia","alamat","avatar",'user_id'];
    
    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/education.png');
        }
        return asset('storage/students/img/'. $this->avatar);
    }

    /**
     * The roles that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mapel(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }
}
    