<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\ActionLogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActionLogController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_action_log(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_action_log:'.json_encode($dt_body));
        $jenis_action_log_id = (array_key_exists('jenis_action_log_id', $dt_body) ? $dt_body['jenis_action_log_id'] : '0');
        $action_log_id = (array_key_exists('action_log_id', $dt_body) ? $dt_body['action_log_id'] : '0');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');
        error_log('list_action_log - jenis_action_log_id:'.$jenis_action_log_id.' -- ');
        $conditions = [];

        $selected = ['id', 'user_name', 'crated_at', 'action', 'request', 'response'];
        $action_log = ActionLogModel::where($conditions)
            ->where(function ($query) use ($search_txt) {
                $query->where('user_name', 'like', '%'.$search_txt.'%')
                    ->orWhere('action', 'like', '%'.$search_txt.'%')
                    ->orWhere('request', 'like', '%'.$search_txt.'%')
                    ->orWhere('response', 'like', '%'.$search_txt.'%');
            })
            ->get();

        return response(['rc' => '000', 'actions' => ProjectResource::collection($action_log), 'message' => 'Retrieved successfully']);
    }

    public function cari_asset(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_action_log:'.json_encode($dt_body));
        $jenis_action_log_id = (array_key_exists('jenis_action_log_id', $dt_body) ? $dt_body['jenis_action_log_id'] : '-1');
        $action_log_id = (array_key_exists('action_log_id', $dt_body) ? $dt_body['action_log_id'] : '-1');
        $jenis_asset_id_1 = (array_key_exists('jenis_asset_id_1', $dt_body) ? $dt_body['jenis_asset_id_1'] : '-1');
        $jenis_asset_id_2 = (array_key_exists('jenis_asset_id_2', $dt_body) ? $dt_body['jenis_asset_id_2'] : '-1');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');

        $arr_where = [];
        if ($jenis_asset_id_1 > 0 || $jenis_asset_id_2 > 0) {
            if ($jenis_action_log_id > 0) {
                array_push($arr_where, ['action_log.jenis_action_log_id', '=', $jenis_action_log_id]);
            }
            if ($action_log_id > 0) {
                array_push($arr_where, ['action_log.id', '=', $action_log_id]);
            }
            if ($jenis_asset_id_1 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', 'like', $jenis_asset_id_1.'%']);
            }
            if ($jenis_asset_id_2 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', '=', $jenis_asset_id_2]);
            }
            $action_log = ActionLogModel::join('asset', 'action_log.id', '=', 'asset.action_log_id')
                ->where($arr_where)
                ->get(['action_log.*']);

        } else {
            if ($jenis_action_log_id > 0) {
                array_push($arr_where, ['jenis_action_log_id', '=', $jenis_action_log_id]);
            }
            if ($action_log_id > 0) {
                array_push($arr_where, ['id', '=', $action_log_id]);
            }

            $action_log = ActionLogModel::where($arr_where)
                ->get();
        }

        return $action_log;
    }

    public function cari_summary(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_action_log:'.json_encode($dt_body));
        $jenis_action_log_id = (array_key_exists('jenis_action_log_id', $dt_body) ? $dt_body['jenis_action_log_id'] : '-1');
        $action_log_id = (array_key_exists('action_log_id', $dt_body) ? $dt_body['action_log_id'] : '-1');
        $jenis_asset_id_1 = (array_key_exists('jenis_asset_id_1', $dt_body) ? $dt_body['jenis_asset_id_1'] : '-1');
        $jenis_asset_id_2 = (array_key_exists('jenis_asset_id_2', $dt_body) ? $dt_body['jenis_asset_id_2'] : '-1');

        $arr_where = [];
        if ($jenis_asset_id_1 > 0 || $jenis_asset_id_2 > 0) {
            if ($jenis_action_log_id > 0) {
                array_push($arr_where, ['action_log.jenis_action_log_id', '=', $jenis_action_log_id]);
            }
            if ($action_log_id > 0) {
                array_push($arr_where, ['action_log.id', '=', $action_log_id]);
            }
            if ($jenis_asset_id_1 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', 'like', $jenis_asset_id_1.'%']);
            }
            if ($jenis_asset_id_2 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', '=', $jenis_asset_id_2]);
            }
            $action_log = ActionLogModel::join('asset', 'action_log.id', '=', 'asset.action_log_id')
                ->where($arr_where)
                ->get(['action_log.*']);

        } else {
            if ($jenis_action_log_id > 0) {
                array_push($arr_where, ['jenis_action_log_id', '=', $jenis_action_log_id]);
            }
            if ($action_log_id > 0) {
                array_push($arr_where, ['id', '=', $action_log_id]);
            }

            $action_log = ActionLogModel::where($arr_where)
                ->get();
        }

        return $action_log;
    }

    public function save(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama' => 'required|max:255',
            'kode' => 'required|max:255',
            'alamat' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ]);
        error_log('simpan ActionLog:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'STASIUN-SAVE';
        $actionLogModel->request = json_encode($actionData);

        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $action_log = [];
        //        $action_log = User::create($data  );
        $action_logModel = new ActionLogModel;
        $action_logModel->nama = $data['nama'];
        $action_logModel->kode = $data['kode'];
        $action_logModel->alamat = $data['alamat'];
        $action_logModel->deskripsi = $data['deskripsi'];
        $action_logModel->latitude = $data['latitude'];
        $action_logModel->longitude = $data['longitude'];
        $action_logModel->created_by = auth()->user()->email;
        $action_logModel->save();

        $resp = response(['rc' => '000', 'action_log' => new ProjectResource($action_log), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function update_action_log(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'action_log_id' => 'required|numeric|min:0|not_in:0',
            'nama' => 'required|max:255',
            'alamat' => '',
            'deskripsi' => '',
            'latitude' => '',
            'longitude' => '',
        ]);
        error_log('simpan ActionLog:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'STASIUN-UPDATE';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }

        $action_log = [];
        //        $studio = User::create($data  );
        $action_logModel = ActionLogModel::find($data['action_log_id']);
        $action_logModel->nama = $data['nama'];
        $action_logModel->alamat = $data['alamat'];
        $action_logModel->deskripsi = $data['deskripsi'];
        $action_logModel->latitude = $data['latitude'];
        $action_logModel->longitude = $data['longitude'];
        $action_logModel->updated_by = auth()->user()->email;
        $action_logModel->update();

        $resp = response(['rc' => '000', 'action_log' => new ProjectResource($action_log), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function delete_action_log(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'action_log_id' => 'required|numeric|min:0|not_in:0',
        ]);
        error_log('simpan ActionLog:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'STASIUN-DELETE';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $action_log = [];
        $action_logModel = ActionLogModel::find($data['action_log_id']);
        $action_logModel->status = 'DEL';
        $action_logModel->updated_by = auth()->user()->email;
        $action_logModel->update();

        $resp = response(['rc' => '000', 'action_log' => new ProjectResource($action_log), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function detail_action_logs(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'search_by' => '',
        ]);
        $id = $validatedData['id'];
        $action_log = User::where('id', '=', $id)->first();

        return response(['rc' => '000', 'action_logi' => new ProjectResource($action_log), 'message' => 'Show detail successfully']);
    }

    public function detail_action_log(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_asset:'.json_encode($dt_body));
        $action_log_id = (array_key_exists('action_log_id', $dt_body) ? $dt_body['action_log_id'] : '-1');

        $conditions = [];
        $dt = ['action_log.id', '=', $action_log_id];
        array_push($conditions, $dt);

        $selected = ['action_log.*'];
        $action_log = ActionLogModel::where($conditions)
            ->get($selected);

        return response(['rc' => '000', 'action_log' => ProjectResource::collection($action_log), 'message' => 'Retrieved successfully']);
    }
}
