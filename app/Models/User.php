<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_number',
        'name',
        'kana',
        'gender',
        'birthday',
        'class',
        'address',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
//        'member_number' => 'integer',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function scores(){
        return $this->hasMany('App\Models\Score');
    }

    public static function editUser($edit_user_array)
    {
//        $user_id = $edit_user_array->id;
        $form = $edit_user_array->all;
        User::where('id', $edit_user_array->id)->update();
        //
    }

    public function getUser()
    {
        //カラムがtext型なので数字に変換,さらにペジネーション50件毎
        $users = User::orderByRaw('CAST(member_number as signed) ASC')->paginate(50);

        //生年月日かた年齢を計算し追加する
        foreach ($users as $user){
            $now = date('Ymd');
            $birthday = $user->birthday;
            $birthday = str_replace('-', '', $birthday);
            $age = floor(($now - $birthday) / 10000);
            $user['age'] = $age;
        }

        return $users;
    }

    //値を段位に変換
    public function convUserGrade($param)
    {
        if ($param === 0){
            return '達人';
        }elseif ($param === 1){
            return '黒帯';
        }elseif ($param === 2){
            return '上級';
        }elseif ($param === 3){
            return '赤帯';
        }elseif ($param === 4){
            return '中級';
        }elseif ($param === 5){
            return '小結';
        }elseif ($param === 6){
            return '白帯';
        }elseif ($param === 7){
            return '初級';
        }else{
            return '初級';
        }
    }

}
