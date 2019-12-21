<?php
namespace App\Http\Controllers;

use App\User;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    private $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = $this->users->getAll();

        return view('user.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validdata = $request->validated();
        $this->users->update($validdata, $id);

        return redirect()->route('user', ['id'=> $id])
                            ->with('success','User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = ""; $status = "";
        if($this->users->delete($id)){
            $message = "User deleted successfully";
        } else {
            $message = "Error occurred";
        }

        return redirect()->route('users')
                            ->with($status, $message);
    }
}
