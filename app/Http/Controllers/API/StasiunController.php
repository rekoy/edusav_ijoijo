<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\ActionLogModel;
use App\Models\AssetModel;
use App\Models\JenisAssetModel;
use App\Models\StasiunModel;
use App\Models\StudioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StasiunController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_stasiun(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_stasiun:'.json_encode($dt_body));
        $jenis_stasiun_id = (array_key_exists('jenis_stasiun_id', $dt_body) ? $dt_body['jenis_stasiun_id'] : '0');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '0');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');
        error_log('list_stasiun - jenis_stasiun_id:'.$jenis_stasiun_id.' -- ');
        $conditions = [];
        array_push($conditions, ['status', '<>', 'DEL']);

        $selected = ['id', 'jenis_stasiun', 'nama', 'kode', 'alamat', 'longitude', 'latitude', 'deskripsi'];
        if ($jenis_stasiun_id > 0) {
            $dt = ['jenis_stasiun_id', '=', $jenis_stasiun_id];
            array_push($conditions, $dt);
        }
        if ($stasiun_id > 0) {
            $dt = ['id', '=', $stasiun_id];
            array_push($conditions, $dt);
        }
        $stasiun = StasiunModel::where($conditions)
            ->where(function ($query) use ($search_txt) {
                $query->where('nama', 'like', '%'.$search_txt.'%')
                    ->orWhere('alamat', 'like', '%'.$search_txt.'%')
                    ->orWhere('deskripsi', 'like', '%'.$search_txt.'%');
            })
            ->get();

        return response(['rc' => '000', 'stasiuns' => ProjectResource::collection($stasiun), 'message' => 'Retrieved successfully']);
    }

    public function list_stasiun_excel(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_stasiun:'.json_encode($dt_body));
        $jenis_stasiun_id = (array_key_exists('jenis_stasiun_id', $dt_body) ? $dt_body['jenis_stasiun_id'] : '0');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '0');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');
        error_log('list_stasiun - jenis_stasiun_id:'.$jenis_stasiun_id.' -- ');
        $conditions = [];
        array_push($conditions, ['status', '<>', 'DEL']);

        $selected = ['nama', 'kode', 'alamat', 'longitude', 'latitude', 'deskripsi'];
        if ($jenis_stasiun_id > 0) {
            $dt = ['jenis_stasiun_id', '=', $jenis_stasiun_id];
            array_push($conditions, $dt);
        }
        if ($stasiun_id > 0) {
            $dt = ['id', '=', $stasiun_id];
            array_push($conditions, $dt);
        }
        $stasiun = StasiunModel::where($conditions)
            ->where(function ($query) use ($search_txt) {
                $query->where('nama', 'like', '%'.$search_txt.'%')
                    ->orWhere('alamat', 'like', '%'.$search_txt.'%')
                    ->orWhere('deskripsi', 'like', '%'.$search_txt.'%');
            })
            ->get($selected);

        return response(['rc' => '000', 'stasiuns' => ProjectResource::collection($stasiun), 'message' => 'Retrieved successfully']);
    }

    public function cari_asset(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_stasiun:'.json_encode($dt_body));
        $jenis_stasiun_id = (array_key_exists('jenis_stasiun_id', $dt_body) ? $dt_body['jenis_stasiun_id'] : '-1');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '-1');
        $jenis_asset_id_1 = (array_key_exists('jenis_asset_id_1', $dt_body) ? $dt_body['jenis_asset_id_1'] : '-1');
        $jenis_asset_id_2 = (array_key_exists('jenis_asset_id_2', $dt_body) ? $dt_body['jenis_asset_id_2'] : '-1');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');

        $arr_where = [];
        if ($jenis_asset_id_1 > 0 || $jenis_asset_id_2 > 0) {
            if ($jenis_stasiun_id > 0) {
                array_push($arr_where, ['stasiun.jenis_stasiun_id', '=', $jenis_stasiun_id]);
            }
            if ($stasiun_id > 0) {
                array_push($arr_where, ['stasiun.id', '=', $stasiun_id]);
            }
            if ($jenis_asset_id_1 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', 'like', $jenis_asset_id_1.'%']);
            }
            if ($jenis_asset_id_2 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', '=', $jenis_asset_id_2]);
            }
            $stasiun = StasiunModel::join('asset', 'stasiun.id', '=', 'asset.stasiun_id')
                ->where($arr_where)
                ->get(['stasiun.*']);

        } else {
            if ($jenis_stasiun_id > 0) {
                array_push($arr_where, ['jenis_stasiun_id', '=', $jenis_stasiun_id]);
            }
            if ($stasiun_id > 0) {
                array_push($arr_where, ['id', '=', $stasiun_id]);
            }

            $stasiun = StasiunModel::where($arr_where)
                ->get();
        }

        return $stasiun;
    }

    public function cari_asset_summary(Request $request)
    {
        $dt_body = $request->all();
        error_log('request cari_asset_summary:'.json_encode($dt_body));
        $jenis_stasiun_id = (array_key_exists('jenis_stasiun_id', $dt_body) ? $dt_body['jenis_stasiun_id'] : '-1');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '-1');
        $jenis_asset_id_1 = (array_key_exists('jenis_asset_id_1', $dt_body) ? $dt_body['jenis_asset_id_1'] : '-1');
        $jenis_asset_id_2 = (array_key_exists('jenis_asset_id_2', $dt_body) ? $dt_body['jenis_asset_id_2'] : '-1');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');

        $arr_where = [];
        if ($jenis_asset_id_1 > 0 || $jenis_asset_id_2 > 0) {
            if ($jenis_stasiun_id > 0) {
                array_push($arr_where, ['stasiun.jenis_stasiun_id', '=', $jenis_stasiun_id]);
            }
            if ($stasiun_id > 0) {
                array_push($arr_where, ['stasiun.id', '=', $stasiun_id]);
            }
            if ($jenis_asset_id_1 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', 'like', $jenis_asset_id_1.'%']);
            }
            if ($jenis_asset_id_2 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', '=', $jenis_asset_id_2]);
            }
            $stasiun = StasiunModel::join('asset', 'stasiun.id', '=', 'asset.stasiun_id')
                ->where($arr_where)
                ->get(['stasiun.*']);

        } else {
            if ($jenis_stasiun_id > 0) {
                array_push($arr_where, ['jenis_stasiun_id', '=', $jenis_stasiun_id]);
            }
            if ($stasiun_id > 0) {
                array_push($arr_where, ['id', '=', $stasiun_id]);
            }

            $stasiun = StasiunModel::where($arr_where)
                ->get();
        }

        $jenisAssetModel = new JenisAssetModel;
        $jenis_asset_1 = $jenisAssetModel->where('parent_id', '=', '0')
            ->get();
        for ($k = 0; $k < count($jenis_asset_1); $k++) {
            $jenisAssetModel = new JenisAssetModel;
            $jenis_asset_2 = JenisAssetModel::where('parent_id', '=', $jenis_asset_1[$k]['id'])
                ->get();
            $dt_sub_jenis = [];
            for ($l = 0; $l < count($jenis_asset_2); $l++) {
                $dt_sub['id'] = $jenis_asset_2[$l]['id'];
                $dt_sub['jenis'] = $jenis_asset_2[$l]['nama'];
                array_push($dt_sub_jenis, $dt_sub);
            }

            $jenis_asset_1[$k]['sub'] = $dt_sub_jenis;
        }
        for ($i = 0; $i < count($stasiun); $i++) {
            $dt = [];
            $dt['jml_studio'] = StudioModel::where('stasiun_id', '=', $stasiun[$i]['id'])->count();
            $dt['jml_asset'] = AssetModel::where('stasiun_id', '=', $stasiun[$i]['id'])->get()->sum('jumlah');
            $dt['asset'] = [];

            for ($k = 0; $k < count($jenis_asset_1); $k++) {
                $dt_stat['jenis'] = $jenis_asset_1[$k]['nama'];
                $conditions = [];
                array_push($conditions, ['jenis_asset_id', 'like', $jenis_asset_1[$k]['id'].'%']);
                array_push($conditions, ['stasiun_id', '=', $stasiun[$i]['id']]);
                $dt_stat['jml'] = AssetModel::where($conditions)->get()->sum('jumlah');
                $dt_stat['sub'] = [];
                $dt_sub = [];
                for ($l = 0; $l < count($jenis_asset_1[$k]['sub']); $l++) {
                    $dt_sub['sub_jenis'] = $jenis_asset_1[$k]['sub'][$l]['jenis'];
                    $conditions = [];
                    array_push($conditions, ['jenis_asset_id', 'like', $jenis_asset_1[$k]['sub'][$l]['id'].'%']);
                    array_push($conditions, ['stasiun_id', '=', $stasiun[$i]['id']]);
                    $dt_sub['sub_jml'] = AssetModel::where($conditions)->get()->sum('jumlah');
                    array_push($dt_stat['sub'], $dt_sub);
                }
                array_push($dt['asset'], $dt_stat);
            }
            $stasiun[$i]['data'] = $dt;
        }

        return $stasiun;
    }

    public function cari_summary(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_stasiun:'.json_encode($dt_body));
        $jenis_stasiun_id = (array_key_exists('jenis_stasiun_id', $dt_body) ? $dt_body['jenis_stasiun_id'] : '-1');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '-1');
        $jenis_asset_id_1 = (array_key_exists('jenis_asset_id_1', $dt_body) ? $dt_body['jenis_asset_id_1'] : '-1');
        $jenis_asset_id_2 = (array_key_exists('jenis_asset_id_2', $dt_body) ? $dt_body['jenis_asset_id_2'] : '-1');

        $arr_where = [];
        if ($jenis_asset_id_1 > 0 || $jenis_asset_id_2 > 0) {
            if ($jenis_stasiun_id > 0) {
                array_push($arr_where, ['stasiun.jenis_stasiun_id', '=', $jenis_stasiun_id]);
            }
            if ($stasiun_id > 0) {
                array_push($arr_where, ['stasiun.id', '=', $stasiun_id]);
            }
            if ($jenis_asset_id_1 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', 'like', $jenis_asset_id_1.'%']);
            }
            if ($jenis_asset_id_2 > 0) {
                array_push($arr_where, ['asset.jenis_asset_id', '=', $jenis_asset_id_2]);
            }
            $stasiun = StasiunModel::join('asset', 'stasiun.id', '=', 'asset.stasiun_id')
                ->where($arr_where)
                ->get(['stasiun.*']);

        } else {
            if ($jenis_stasiun_id > 0) {
                array_push($arr_where, ['jenis_stasiun_id', '=', $jenis_stasiun_id]);
            }
            if ($stasiun_id > 0) {
                array_push($arr_where, ['id', '=', $stasiun_id]);
            }

            $stasiun = StasiunModel::where($arr_where)
                ->get();
        }

        return $stasiun;
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
        error_log('simpan Stasiun:'.json_encode($data));
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
        $stasiun = [];
        //        $stasiun = User::create($data  );
        $stasiunModel = new StasiunModel;
        $stasiunModel->nama = $data['nama'];
        $stasiunModel->kode = $data['kode'];
        $stasiunModel->alamat = $data['alamat'];
        $stasiunModel->deskripsi = $data['deskripsi'];
        $stasiunModel->latitude = $data['latitude'];
        $stasiunModel->longitude = $data['longitude'];
        $stasiunModel->created_by = auth()->user()->email;
        $stasiunModel->save();

        $resp = response(['rc' => '000', 'stasiun' => new ProjectResource($stasiun), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function update_stasiun(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'stasiun_id' => 'required|numeric|min:0|not_in:0',
            'nama' => 'required|max:255',
            'alamat' => '',
            'deskripsi' => '',
            'latitude' => '',
            'longitude' => '',
        ]);
        error_log('simpan Stasiun:'.json_encode($data));
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

        $stasiun = [];
        //        $studio = User::create($data  );
        $stasiunModel = StasiunModel::find($data['stasiun_id']);
        $stasiunModel->nama = $data['nama'];
        $stasiunModel->alamat = $data['alamat'];
        $stasiunModel->deskripsi = $data['deskripsi'];
        $stasiunModel->latitude = $data['latitude'];
        $stasiunModel->longitude = $data['longitude'];
        $stasiunModel->updated_by = auth()->user()->email;
        $stasiunModel->update();

        $resp = response(['rc' => '000', 'stasiun' => new ProjectResource($stasiun), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function delete_stasiun(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'stasiun_id' => 'required|numeric|min:0|not_in:0',
        ]);
        error_log('simpan Stasiun:'.json_encode($data));
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
        $stasiun = [];
        $stasiunModel = StasiunModel::find($data['stasiun_id']);
        $stasiunModel->status = 'DEL';
        $stasiunModel->updated_by = auth()->user()->email;
        $stasiunModel->update();

        $resp = response(['rc' => '000', 'stasiun' => new ProjectResource($stasiun), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function detail_stasiuns(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'search_by' => '',
        ]);
        $id = $validatedData['id'];
        $stasiun = User::where('id', '=', $id)->first();

        return response(['rc' => '000', 'stasiuni' => new ProjectResource($stasiun), 'message' => 'Show detail successfully']);
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
}
