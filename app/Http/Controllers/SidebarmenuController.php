<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Sidebarmenu;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleHasPermission;
use Spatie\Permission\Traits\HasRoles;

class SidebarmenuController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sidebar_menu.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sidebar_menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $name = $request->name;
        $icon = $request->icon;
        $url = $request->url;

        $slugyfy_name = $this->slugify($name);
        $permission_data = [
            'name' => $slugyfy_name,
            'guard_name' => 'web',
        ];
        $permission = Permission::create($permission_data);
        $id = $permission->id;

        $user = Auth::user();
        $current_user_role_id = $user->roles->first()->id;

        $role = Role::find($current_user_role_id);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $data = [
            'name' => $name,
            'icon' => $icon,
            'url' => $url,
            'permission_id' => $id,
            'permission_name' => $slugyfy_name,
        ];
        Sidebarmenu::create($data);

        return redirect()->route('menus.create')
            ->with('success','Menu created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function slugify($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicated - symbols
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    
}
