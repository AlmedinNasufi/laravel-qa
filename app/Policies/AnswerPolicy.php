<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Answer  $answer
     * @return mixed
     */
    public function delete(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Answer  $answer
     * @return mixed
     */
    public function restore(User $user, Answer $answer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Answer  $answer
     * @return mixed
     */
    public function forceDelete(User $user, Answer $answer)
    {
        //
    }
}
