<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Helpers\ImageSaver;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 private $imageSaver;
	 private $password = 12345678;
	 
	 public function __construct(ImageSaver $imageSaver)
	 {
		 $this->imageSaver = $imageSaver;
		 
		 $this->authorizeResource(User::class, 'user');
	 }
	     protected function resourceAbilityMap()
    {
        return [
            'index' => 'viewAny',
          'trash' => 'viewAny',
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
			'restore' => 'restore',
			'forceDelete' => 'forceDelete',
        ];
    }
    protected function resourceMethodsWithoutModels()
    {
        return ['index', 'create', 'store', 'trash'];
    }

    public function index()
    {
        //
		$users = User::all();
		return view('admin.users.index', compact('users'));
    }

/* *
get users from the trash
*/
public function trash()
{
	$users = User::onlyTrashed()->get();
	return view('admin.users.trash', compact('users'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$roles = Role::where('id', '!=', 1)->get();
		return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
		$data = $request->safe()->all();
		
		$requestImage = $request->file('avatar');
								if($requestImage){
						$data['avatar'] = $this->imageSaver->upload($requestImage, null, 'users');
						}
						else $data['avatar'] = 'canon.png';
						
								$data['password'] = $this->password;
								
$user = User::create($data);
						        event(new Registered($user));

			    session()->flash('message', trans('users/flash.store'));
        return to_route('admin.users.edit', ['user' => $user->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
		$roles = Role::where('id', '!=', 1)->get();
		return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        //
				$data = $request->safe()->all();
		
		$requestImage = $request->file('avatar');
								if($requestImage){
						$data['avatar'] = $this->imageSaver->upload($requestImage, $user->avatar, 'users');
						}
						else $data['avatar'] = $user->avatar ?? 'canon.png';
						

$user->update($data);
session()->flash('message', trans('users/flash.update'));
return to_route('admin.users.edit', ['user' => $user->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
		$user->delete();

		session()->flash('message', trans('users/flash.delete'));
		return to_route('admin.users.index');

    }
		/* *
	restore the deleted user
	*/
	public function restore(User $user)
	{
		if ($user->trashed()) $user->restore();
				session()->flash('message', trans('users/flash.restore'));
		return to_route('admin.users.trash');
	}
	/* *
	force delete the user
	*/
	public function forceDelete(User $user)
	{
		if ($user->trashed()) $user->forceDelete();
						session()->flash('message', trans('users/flash.force-delete'));
		return to_route('admin.users.trash');

	}
}
