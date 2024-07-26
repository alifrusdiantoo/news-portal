<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $guarded = ['id'];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function articlesPosted(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id')->orderBy('created_at', 'desc');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($author) {
            if ($author->isForceDeleting()) {
                $author->articlesPosted()->forceDelete();
            } else {
                $author->articlesPosted()->delete();
            }
        });

        static::restoring(function ($author) {
            $author->articlesPosted()->withTrashed()->restore();
        });
    }
}
