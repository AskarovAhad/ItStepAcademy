<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $data_arr = DB::table('sounds_table')->join('users', 'sounds_table.author_id', '=', 'users.id')->join('genre_info', 'sounds_table.genre_id', '=', 'genre_info.id')->get();
        return view('home', ['data_arr' => $data_arr]);
    }

    public function profile($user_id = '')
    {
        $any_sounds = true;
        $user_data_arr = DB::table('sounds_table')->join('users', 'sounds_table.author_id', '=', 'users.id')->join('genre_info', 'sounds_table.genre_id', '=', 'genre_info.id')->where('users.id', '=', $user_id)->get();

        $genre_list = DB::table('genre_info')->select('*')->get();
        if (count($user_data_arr) == 0) {
            $user_data_arr = DB::table('users')->select('*')->where('users.id', '=', $user_id)->get();
            $any_sounds = false;
        }
        if (count($user_data_arr) == 0) return view('user_profile_err');

        return view('myhome', ['user_data_arr' => $user_data_arr, 'any_sounds' => $any_sounds, 'genre_list' => $genre_list]);
    }
    public function delete_sound(Request $request)
    {
        DB::table('sounds_table')->where('sounds_table.sound_id', '=', $request->sound_id)->delete();
        return back();
    }
    public function change_visibility_sound(Request $request)
    {
        DB::table('sounds_table')->where('sound_id', '=', $request->sound_id)->update(['is_show' => $request->is_show]);
        return back();
    }
    public function edit_sound(Request $request)
    {
        $new_img_name = '';
        if ($request->sound_img == null) $new_img_name = $request->default_sound_img;
        else {
            $new_img_name = $request->sound_id . '.' . $request->sound_img->extension();
            $request->sound_img->move(public_path('sound_images'), $new_img_name);
        }
        DB::table('sounds_table')->where('sound_id', '=', $request->sound_id)->update([
            'sound_name' => $request->sound_name,
            'genre_id' => $request->genre,
            'img' => $new_img_name
        ]);

        return back();
    }
    public function change_sound_genre(Request $request)
    {
        DB::table('sounds_table')->where('sound_id', '=', $request->sound_id)->update([
            'genre_id' => $request->genre,
        ]);
        return back();
    }
    public function add_sound(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'sound_name' => 'required|alpha_num|max:50|min:1',
            'sound_img' => 'required|image',
            'sound_file' => 'required|',
        ]);
        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }

        $last_id = json_decode(json_encode(DB::table('sounds_table')->select('sound_id')->orderByDesc('sound_id')->first()), true);
        $last_id['sound_id'] += 1;
        $new_sound_img = $last_id['sound_id'] . '.' . $request->sound_img->extension();
        $new_sound_file = $last_id['sound_id'] . '.mp3';

        $request->sound_img->move(public_path('sound_images'), $new_sound_img);
        $request->sound_file->move(public_path('all_sounds'), $new_sound_file);
        DB::table('sounds_table')->insert([
            'img' => $new_sound_img,
            'sound_name' => $request->sound_name,
            'file_name' => $new_sound_file,
            'genre_id' => $request->genre,
            'author_id' => $request->user_id,
            'is_accepted' => 0,
            'is_show' => 0,
        ]);
        return back();
    }
    public function search_sound(Request $request)
    {
        $data_arr = DB::table('sounds_table')
            ->join('users', 'sounds_table.author_id', '=', 'users.id')
            ->join('genre_info', 'sounds_table.genre_id', '=', 'genre_info.id')
            ->where('sounds_table.sound_name', 'like', '%' . $request->search . '%')
            ->orWhere('genre_info.genre_name', '=', $request->search)
            ->get();

        if (count($data_arr) == 0) return view('sound_search_err');
        return view('home', ['data_arr' => $data_arr]);
    }
    public function appeal_sound($sound_id = '0')
    {
        $data_arr = DB::table('sounds_table')
            ->join('users', 'sounds_table.author_id', '=', 'users.id')
            ->join('genre_info', 'sounds_table.genre_id', '=', 'genre_info.id')
            ->where('sounds_table.sound_id', '=', $sound_id)
            ->get();

        return view('appeal_sound', ['data_arr' => $data_arr]);
    }
    public function appeal_sound_done(Request $request){
        DB::table('appeals_table')->where('id','=',$request->appeal_id)->update(['is_done'=>1]);
        return back();
    }
    public function accept_sound(Request $request){
        DB::table('sounds_table')->where('sound_id','=',$request->sound_id)->update([
            'is_accepted'=>1,
        ]);
        return back();
    }
    public function send_appeal_sound(Request $request)
    {
        DB::table('appeals_table')->insert([
            'from' => $request->from,
            'to' => $request->to,
            'sound_id' => $request->sound_id,
            'text' => $request->text,
            'is_done' => 0,
        ]);

        return redirect('http://localhost/exam2/public/home');
    }

    public function ban_user(Request $request)
    {
        DB::table('users')->where('name', '=', $request->user_name)->update(['is_banned' => 1]);
        return back();
    }
    public function unban_user(Request $request)
    {
        DB::table('users')->where('name', '=', $request->user_name)->update(['is_banned' => 0]);
        return back();
    }
    public function delete_user(Request $request)
    {
        DB::table('users')->where('name', '=', $request->user_name)->delete();
        return back();
    }
    public function update_user_status(Request $request)
    {
        DB::table('users')->where('id', '=', $request->user_id)->update(['status' => $request->status]);
        return back();
    }
    public function add_user(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }
        $user = new UsersModel;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_banned = 0;
        $user->status = $request->user_status;
        $user->save();
        return back();
    }
    public function delete_genre(Request $request)
    {
        DB::table('genre_info')->where('id', '=', $request->id)->delete();
        return back();
    }
    public function add_new_genre(Request $request)
    {
        DB::table('genre_info')->insert([
            'genre_name' => $request->name,
        ]);
        return back();
    }


    public function admin_panel_main()
    {
        return view('admin_panel_main');
    }
    public function admin_panel($action = '')
    {
        if ($action == 'admin_genres') {
            return view('admin_panel_genre', ['data_info' => DB::table('genre_info')->select('*')->get()]);
        }
        if ($action == 'admin_users') {
            return view('admin_panel_users', ['data_info' => DB::table('users')->select('*')->get()]);
        }
        if ($action == 'admin_sounds') {
            $genre_list = DB::table('genre_info')->select('*')->get();
            $data_info = DB::table('sounds_table')
                ->join('users', 'sounds_table.author_id', '=', 'users.id')
                ->join('genre_info', 'sounds_table.genre_id', '=', 'genre_info.id')
                ->get();
            return view('admin_panel_sounds', ['data_info' => $data_info, 'genre_list' => $genre_list]);
        }
        if($action == 'admin_requests_appeals'){
            $data_info = DB::table('sounds_table')
                ->join('users', 'sounds_table.author_id', '=', 'users.id')
                ->join('genre_info', 'sounds_table.genre_id', '=', 'genre_info.id')
                ->where('is_accepted','=',0)
                ->get();
            $appeals_arr = DB::table('appeals_table')->where('is_done','=',0)->get();
            return view('admin_requests_appeals',['data_info'=>$data_info , 'appeals_arr'=>$appeals_arr]);
        }
    }
}
