<?php
/**
 * Created by PhpStorm.
 * User: yanghaoliang
 * Date: 2018/10/6
 * Time: 2:09 AM
 */

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
}