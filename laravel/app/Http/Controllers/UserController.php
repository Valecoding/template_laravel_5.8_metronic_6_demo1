<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Firm;
use App\Group;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index()
    {

        if (!Auth::user()->isAdmins() && !Auth::user()->isBux() && !Auth::user()->isGlavBux()) {
            return Response::json(array('success' => "false", "error" => 'access only admin group'), 200);
        }

        $count = User::where('activation', 1);
        $users = User::where('activation', 1);

        if (request()->has('f_search') && request('f_search')!= ''){
            $count = $count->where('name','LIKE','%' . request('f_search') . '%');
            $users = $users->where('name','LIKE','%' . request('f_search') . '%');
        }

        $count = $count->count();
        $users = $users->orderBy('name', 'asc')
            ->with('firm')
            ->with('branch')
            ->paginate(20);

        return view('users.index', array('title' => 'Сотрудники'))
            ->with('users', $users)
            ->with('count', $count);
    }

    public function store()
    { if (!Auth::user()->isAdmins() && !Auth::user()->isBux() && !Auth::user()->isGlavBux()) {
        return Response::json(array('success' => "false", "error" => 'access only admin group'), 200);
    }


        if (Input::get('email') == ''){
            return Response::json(array('success' => "false", "error" => 'Неверный майл'), 200);
        }

        if (request()->has('id') && request('id') != '') {
            $user = User::find(request('id'));
        } else {
            $user = new User();
        }

        $user->name = Input::get('name');
        $user->position = Input::get('position');
        $user->salary = Input::get('salary');
        $user->email = Input::get('email');


        if (Input::get('password') != ''){
            $user->password = Hash::make(Input::get('password'));
        }


        $user->address_registration = Input::get('address_registration');
        $user->address_fact = Input::get('address_fact');
        $user->is_address_fact_as_reg = Input::get('is_address_fact_as_reg');
        if (Input::has('birthday') && Input::get('birthday') != '') {
            $user->birthday = Carbon::createFromFormat('d.m.Y',Input::get('birthday'))->startOfDay();
        } else {
            $user->birthday = null;
        }
        $user->birthday_notification = Input::get('birthday_notification');
        if (Input::has('date_of_registration_for_work') && Input::get('date_of_registration_for_work') != '') {
            $user->date_of_registration_for_work = Carbon::createFromFormat('d.m.Y',Input::get('date_of_registration_for_work'))->startOfDay();
        } else {
            $user->date_of_registration_for_work = null;
        }
        if (Input::has('date_of_dismissal') && Input::get('date_of_dismissal') != '') {
            $user->date_of_dismissal = Carbon::createFromFormat('d.m.Y',Input::get('date_of_dismissal'))->startOfDay();
        } else {
            $user->date_of_dismissal = null;
        }
        $user->is_working = Input::get('is_working');
        $user->contract_number = Input::get('contract_number');
        if (Input::has('contract_date') && Input::get('contract_date') != '') {
            $user->contract_date = Carbon::createFromFormat('d.m.Y',Input::get('contract_date'))->startOfDay();
        } else {
            $user->contract_date = null;
        }
        $user->firm_id = Input::get('firm_id');
        $user->branch_id = Input::get('branch_id');
        $user->group_id = Input::get('group_id');

        if (request()->hasFile('photo')) {
            $file = request()->file('photo');
            if ($file->isValid()) {
                //удаляем старый если есть что бы не висел
                $old_file = $user->photo;
                if ($old_file != null) {
                    if (file_exists(public_path($old_file))) {
                        unlink(public_path($old_file));
                    }
                }
                //далее новый обрабатываем
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $time = time();
                $path = '/uploads/user_photos/';
                $name = $year . '_' . $month . '_' . $day . '_' . $time . '_' . $file->getClientOriginalName();

                $file->move(public_path($path), $name);
                $file_link = $path . $name;

                $user->photo = $file_link;

            }
        }
    //если запрос что фото удалено
        if (request('isdeletephoto') == 1){
            $old_file = $user->photo;
            if ($old_file != null) {
                if (file_exists(public_path($old_file))) {
                    unlink(public_path($old_file));
                }
            }
            $user->photo = null;
        }
        $user->activation = 1;
        $user->save();

        return Response::json(array('success' => "true"), 200);
    }

    public function add()
    {
        if (!Auth::user()->isAdmins() && !Auth::user()->isBux() && !Auth::user()->isGlavBux()) {
            return Response::json(array('success' => "false", "error" => 'access only admin group'), 200);
        }

        $groups_req = Group::all()->groupBy('category');

        $firms = Firm::where('active', 1)->get();
        $branches = Branch::where('active', 1)->get();
        return view('users.form', array('title' => 'Сотрудник'))
            ->with('groups', $groups_req)
            ->with('branches', $branches)
            ->with('firms', $firms);
    }


    public function edit($id)
    {
        if (!Auth::user()->isAdmins() && !Auth::user()->isBux() && !Auth::user()->isGlavBux()) {
            return Response::json(array('success' => "false", "error" => 'access only admin group'), 200);
        }
        $user = User::find($id);
        if ($user == null) {
            return Response::json(array('success' => "false", "error" => 'not found'), 200);
        }

        $groups_req = Group::all()->groupBy('category');

        $firms = Firm::where('active', 1)->get();
        $branches = Branch::where('active', 1)->get();
        return view('users.form', array('title' => 'Сотрудник'))
            ->with('user', $user)
            ->with('groups', $groups_req)
            ->with('branches', $branches)
            ->with('firms', $firms);
    }

    public function delete($id)
    {
        if (!Auth::user()->isAdmins() && !Auth::user()->isBux() && !Auth::user()->isGlavBux()) {
            return Response::json(array('success' => "false", "error" => 'access only admin group'), 200);
        }
        $user = User::find($id);
        if ($user == null) {
            return Response::json(array('success' => "false", "error" => 'not found'), 200);
        }
        $user->activation = 0;
        $user->save();
        return Response::json(array('success' => "true"), 200);
    }
}
