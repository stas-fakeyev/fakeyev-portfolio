<?php

namespace App\Observers;

use App\Models\User;
use App\Helpers\ImageSaver;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CreateUserNotification;
use App\Notifications\UpdateUserNotification;
use App\Notifications\DeleteUserNotification;
use App\Notifications\ForceDeleteUserNotification;
use App\Notifications\RestoreUserNotification;

class UserObserver
{
	public function created(User $user)
	{
		    $user->notify(new CreateUserNotification());
	}
	public function updated(User $user)
	{
		
		   if (! $user->isDirty($user->getDeletedAtColumn()) && count($user->getDirty()) != 1){
					$user->notify(new UpdateUserNotification());
		   }
	}
	public function deleted(User $user)
	{
		if (! $user->isForceDeleting()) $user->notify(new DeleteUserNotification());
	}
	public function forceDeleted(User $user)
	{
						if (isset($user->avatar)){
							$imageSaver = new ImageSaver();
							$imageSaver->remove($user->avatar, 'users');
						}
													$user->notify(new ForceDeleteUserNotification());
	}
public function restored(User $user)
{
														$user->notify(new RestoreUserNotification());
}
}