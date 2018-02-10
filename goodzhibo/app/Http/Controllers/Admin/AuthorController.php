<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/10
 * Time: 16:22
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    const HEI_TU_AUTH_SESSION = "HEI_TU_AUTH_SESSION";
    const HEI_TU_AUTH_TOKEN = "HEI_TU_AUTH_TOKEN";
    public function __construct()
    {
        $this->middleware('admin_auth')->except(['login.html', 'logout']);
    }

    public function sign(Request $request) {
        $isPost = $request->isMethod('post');
        $nickname = $request->input('nickname');
        $password = $request->input('password');
        if ($isPost) {

            return "";
        }
        return view('admin.auth.login');
    }

}