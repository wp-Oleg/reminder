<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use \Storage; 
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const IS_BANNED = 1;
    const IS_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email'
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
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();    
    }

    public function uploadAvatar($image)
    {
       if($image == null) {return;}

       $this->removeAvatar();
       
       $filename = Str::random(10) . '.' . $image->extension();
       $image->storeAs('uploads', $filename);
       $this->avatar = $filename;
       $this->save();
    }

    public function getAvatar()
    {
        if($this->avatar == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->avatar;
    }

    public function removeAvatar()
    {
        if($this->avatar != null)
        {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function makeAdmin()
    {
        $this->is_admin = 1;
    }

    public function makeNormal()
    {
        $this->is_admin = 0;
    }

    public function toggleAdmin()
    {
        if($value == null)
        {
           return $this->makeNormal(); 
        }
        
        return $this->makeAdmin();
    }

    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleBan($value)
    {
        if($value == null)
        {
            return $this->unban();
        }

        return $this->ban();
    }

}
