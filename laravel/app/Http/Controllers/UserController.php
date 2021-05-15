<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $authUser = Auth::user(); // 認証ユーザー取得
        $users = User::all(); // ユーザー全て取得
        $param = [
            'authUser' => $authUser,
            'users' => $users
        ];
        return view('user.index', $param);
    }

    public function userEdit(Request $request)
    {
        $authUser = Auth::user();
        $param = [
            'authUser' => $authUser,
        ];
        return view('user.userEdit', $param);
    }

    public function userUpdate(Request $request)
    {
        // バリデーションチェック
        $rules = [
            'user_id' => 'integer|required',
            'name' => 'required',
        ];

        $messages = [
            'user_id.integer' => 'SystemError:システム管理者にお問い合わせください',
            'user_id.required' => 'SystemError:システム管理者にお問い合わせください',
            'name.required' => 'ユーザー名が未入力です',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect('/user/userEdit')
                ->withErrors($validator)
                ->withInput();
        }

        $uploadfile = $request->file('thumbnail');

            if (!empty($uploadfile)) {
                $thumbnailname = $request->file('thumbnail')->hashName();
                $request->file('thumbnail')->storeAs('public/user', $thumbnailname);

                $param = [
                    'name' => $request->name,
                    'thumbnail' => $thumbnailname,
                ];
            } else {
                $param = [
                    'name' => $request->name,
                ];
            }

        User::where('id', $request->user_id)->update($param);

        return redirect(route('user.userEdit'))->with('success', '保存しました。');
    }
}
