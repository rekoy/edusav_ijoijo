<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\ActionLogModel;
use App\Models\User;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_user(Request $request)
    {
        $validatedData = $request->validate([
            'stasiun_id' => '',
            'access_type' => '',
            'status' => '',
            'search_txt' => '',
        ]);
        $conditions = [];
        array_push($conditions, ['users.status', '<>', 'DEL']);
        if ($validatedData['access_type'] > 0) {
            $dt = ['access_type', '=', $validatedData['access_type']];
            array_push($conditions, $dt);
        }
        if ($validatedData['stasiun_id'] > 0) {
            $dt = ['stasiun_id', '=', $validatedData['stasiun_id']];
            array_push($conditions, $dt);
        }
        if ($validatedData['status'] > 0) {
            $dt = ['status', '=', $validatedData['status']];
            array_push($conditions, $dt);
        }
        $search_txt = $validatedData['search_txt'];
        $selected = ['users.id', 'users.nomor', 'users.msisdn', 'users.url_img', 'users.name', 'users.email', 'users.created_at', 'users.access_type', 'users.status', 'stasiun.nama as nama_stasiun'];
        $users = UsersModel::leftJoin('stasiun', 'stasiun.id', '=', 'users.stasiun_id')->where($conditions)
            ->where(function ($query) use ($search_txt) {
                $query->where('users.name', 'like', '%'.$search_txt.'%')
                    ->orWhere('stasiun.alamat', 'like', '%'.$search_txt.'%')
                    ->orWhere('stasiun.nama', 'like', '%'.$search_txt.'%');
            })
            ->get($selected);

        return response(['rc' => '000', 'users' => ProjectResource::collection($users), 'message' => 'Retrieved successfully']);
    }

    public function index()
    {
        $users = User::all();

        return response(['rc' => '000', 'users' => ProjectResource::collection($users), 'message' => 'Retrieved successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'stasiun_id' => '',
            'access_type' => 'required',
            'name' => 'required|max:255',
            'nomor' => '',
            'msisdn' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'doc_file_img' => '',
            'ext_file_img' => '',
            'name_file_img' => '',
        ]);
        $data['password'] = Hash::make($request->password);
        error_log('simpan:'.json_encode($data));
        $actionData = $data;
        $actionData['doc_file_doc'] = '';
        $actionData['doc_file_img'] = '';
        $actionData['password'] = 'xxxxxxx';
        $actionData['password_confirmation'] = 'xxxxxxx';
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-SAVE';
        $actionLogModel->request = json_encode($actionData);

        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $url_img = '';
        if (strlen($data['doc_file_img']) > 40) {
            $file_img = $data['stasiun_id'].'-'.time().'.'.$data['ext_file_img'];
            $path = public_path().'/upload/asset/img/'.$file_img;
            $url_img = config('urls.storage.image_upload').'/'.$file_img;
            $file_data = base64_decode($data['doc_file_img']);

            $success = file_put_contents($path, $file_data);
        }

        $user = [];
        //        $user = User::create($data	);
        $usersModel = new UsersModel;
        $usersModel->stasiun_id = $data['stasiun_id'];
        $usersModel->access_type = $data['access_type'];
        $usersModel->name = $data['name'];
        $usersModel->nomor = $data['nomor'];
        $usersModel->msisdn = $data['msisdn'];
        $usersModel->email = $data['email'];

        $usersModel->url_img = $url_img;
        $usersModel->file_name_img = $data['name_file_img'];

        $usersModel->created_by = auth()->user()->email;
        $usersModel->password = $data['password'];
        $usersModel->save();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function detail(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'search_by' => '',
        ]);
        $id = $validatedData['id'];
        $user = User::where('id', '=', $id)->first();

        return response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Show detail successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return response(['project' => new ProjectResource($project), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return response(['project' => new ProjectResource($project), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response(['message' => 'Deleted']);
    }

    public function detail_stasiun(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_asset:'.json_encode($dt_body));
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '-1');

        $conditions = [];
        $dt = ['stasiun.id', '=', $stasiun_id];
        array_push($conditions, $dt);

        $selected = ['stasiun.*'];
        $stasiun = StasiunModel::where($conditions)
            ->get($selected);

        return response(['rc' => '000', 'stasiun' => ProjectResource::collection($stasiun), 'message' => 'Retrieved successfully']);
    }

    public function detail_user(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_asset:'.json_encode($dt_body));
        $user_id = (array_key_exists('user_id', $dt_body) ? $dt_body['user_id'] : '-1');

        $conditions = [];
        $dt = ['users.id', '=', $user_id];
        array_push($conditions, $dt);

        $selected = ['users.*', 'stasiun.nama as nama_stasiun'];
        $user = UsersModel::leftJoin('stasiun', 'stasiun.id', '=', 'users.stasiun_id')->where($conditions)
            ->get($selected);

        return response(['rc' => '000', 'user' => ProjectResource::collection($user), 'message' => 'Retrieved successfully']);
    }

    public function update_email(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|numeric|min:0|not_in:0',
            'email' => 'email|required|unique:users',
        ]);
        error_log('simpan User:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-UPDATE-EMAIL';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;

        }
        $user = [];
        //        $studio = User::create($data  );
        $userModel = UsersModel::find($data['user_id']);
        $userModel->email = $data['email'];

        $userModel->updated_by = auth()->user()->email;
        $userModel->update();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function update_user(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|numeric|min:0|not_in:0',
            'name' => 'required|max:255',
            'nomor' => '',
            'msisdn' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'doc_file_img' => '',
            'ext_file_img' => '',
            'name_file_img' => '',
        ]);
        error_log('simpan User:'.json_encode($data));
        $actionData = $data;
        $actionData['doc_file_doc'] = '';
        $actionData['doc_file_img'] = '';
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-UPDATE';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;

        }

        $url_img = '';
        if (strlen($data['doc_file_img']) > 40) {
            $file_img = $data['user_id'].'-'.time().'.'.$data['ext_file_img'];
            $path = public_path().'/upload/asset/img/'.$file_img;
            $url_img = config('urls.storage.image_upload').'/'.$file_img;
            $file_data = base64_decode($data['doc_file_img']);

            $success = file_put_contents($path, $file_data);
        }

        $user = [];
        //        $studio = User::create($data  );
        $userModel = UsersModel::find($data['user_id']);
        $userModel->name = $data['name'];
        $userModel->nomor = $data['nomor'];
        $userModel->msisdn = $data['msisdn'];
        $userModel->url_img = $url_img;
        $userModel->file_name_img = $data['name_file_img'];

        $userModel->updated_by = auth()->user()->email;
        $userModel->update();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function delete_user(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|numeric|min:0|not_in:0',
        ]);
        error_log('simpan User:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-DELETE';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;

        }
        $user = [];
        $userModel = UsersModel::find($data['user_id']);
        $userModel->status = 'DEL';
        $userModel->updated_by = auth()->user()->email;
        $userModel->update();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function update_status(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|numeric|min:0|not_in:0',
            'status' => 'required',
        ]);
        error_log('simpan User:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-UPDATE-STATUS';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $user = [];
        $userModel = UsersModel::find($data['user_id']);
        $userModel->status = $data['status'];
        $userModel->updated_by = auth()->user()->email;
        $userModel->update();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|numeric|min:0|not_in:0',
            'password' => 'required|confirmed',
        ]);
        error_log('simpan User:'.json_encode($data));
        $actionData = $data;
        $actionData['password'] = 'xxxxxxx';
        $actionData['password_confirmation'] = 'xxxxxxx';

        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-RESET-PASSWORD';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $data['password'] = Hash::make($request->password);

        $user = [];
        $userModel = UsersModel::find($data['user_id']);
        $userModel->password = $data['password'];
        $userModel->updated_by = auth()->user()->email;
        $userModel->update();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function change_password(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|numeric|min:0|not_in:0',
            'password' => 'required|confirmed',
        ]);
        error_log('simpan User:'.json_encode($data));
        $actionData = $data;
        $actionData['password'] = 'xxxxxxx';
        $actionData['password_confirmation'] = 'xxxxxxx';

        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'USER-UBAH-PASSWORD';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $data['password'] = Hash::make($request->password);

        $user = [];
        $userModel = UsersModel::find($data['user_id']);
        $userModel->password = $data['password'];
        $userModel->updated_by = auth()->user()->email;
        $userModel->update();

        $resp = response(['rc' => '000', 'user' => new ProjectResource($user), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }
}
