<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Змінна для зберігання email користувача.
     *
     * @var string|null
     */
    protected $userEmail;

    /**
     * Отримати email користувача, що написав коментар.
     *
     * @return string|null
     */
    public function getUserEmailAttribute()
    {
        if (!$this->userEmail) {
            $user = User::find($this->user_id);

            if ($user) {
                $this->userEmail = $user->email;
            }
        }

        return $this->userEmail;
    }
}
