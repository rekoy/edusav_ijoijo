<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\ActionLogModel;
use App\Models\StudioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataStudioController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_studio(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_studio:'.json_encode($dt_body));
        $studio_id = (array_key_exists('studio_id', $dt_body) ? $dt_body['studio_id'] : '0');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '0');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');
        $conditions = [];
        array_push($conditions, ['studio.status', '<>', 'DEL']);
        //    $selected = array('id', 'stasiun_id', 'nama', 'kode','alamat', 'longitude', 'latitude', 'deskripsi');
        $selected = ['studio.*', 'stasiun.nama as nama_stasiun'];

        if ($stasiun_id > 0) {
            $dt = ['stasiun_id', '=', $stasiun_id];
            array_push($conditions, $dt);
        }
        if ($studio_id > 0) {
            $dt = ['id', '=', $studio_id];
            array_push($conditions, $dt);
        }
        error_log('SSGSGS '.json_encode($conditions));
        $studio = StudioModel::join('stasiun', 'stasiun.id', '=', 'studio.stasiun_id')
            ->where($conditions)
            ->where(function ($query) use ($search_txt) {
                $query->where('studio.nama', 'like', '%'.$search_txt.'%')
                    ->orWhere('studio.alamat', 'like', '%'.$search_txt.'%')
                    ->orWhere('studio.deskripsi', 'like', '%'.$search_txt.'%')
                    ->orwhere('stasiun.nama', 'like', '%'.$search_txt.'%')
                    ->orWhere('stasiun.alamat', 'like', '%'.$search_txt.'%')
                    ->orWhere('stasiun.deskripsi', 'like', '%'.$search_txt.'%');
            })
            ->get($selected);

        return response(['rc' => '000', 'datas' => ProjectResource::collection($studio), 'message' => 'Retrieved successfully']);
    }

    public function list_studio_excel(Request $request)
    {
        $dt_body = $request->all();
        error_log('request list_studio:'.json_encode($dt_body));
        $studio_id = (array_key_exists('studio_id', $dt_body) ? $dt_body['studio_id'] : '0');
        $stasiun_id = (array_key_exists('stasiun_id', $dt_body) ? $dt_body['stasiun_id'] : '0');
        $search_txt = (array_key_exists('search_txt', $dt_body) ? $dt_body['search_txt'] : '');
        $conditions = [];
        array_push($conditions, ['studio.status', '<>', 'DEL']);
        //    $selected = array('id', 'stasiun_id', 'nama', 'kode','alamat', 'longitude', 'latitude', 'deskripsi');
        $selected = ['stasiun.nama as nama_stasiun', 'studio.nama', 'studio.kode', 'studio.alamat', 'studio.latitude', 'studio.longitude'];

        if ($stasiun_id > 0) {
            $dt = ['stasiun_id', '=', $stasiun_id];
            array_push($conditions, $dt);
        }
        if ($studio_id > 0) {
            $dt = ['id', '=', $studio_id];
            array_push($conditions, $dt);
        }
        error_log('SSGSGS '.json_encode($conditions));
        $studio = StudioModel::join('stasiun', 'stasiun.id', '=', 'studio.stasiun_id')
            ->where($conditions)
            ->where(function ($query) use ($search_txt) {
                $query->where('studio.nama', 'like', '%'.$search_txt.'%')
                    ->orWhere('studio.alamat', 'like', '%'.$search_txt.'%')
                    ->orWhere('studio.deskripsi', 'like', '%'.$search_txt.'%');
            })
            ->get($selected);

        return response(['rc' => '000', 'studios' => ProjectResource::collection($studio), 'message' => 'Retrieved successfully']);
    }

    public function update_studio(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'studio_id' => 'required|numeric|min:0|not_in:0',
            'nama' => 'required|max:255',
            'alamat' => '',
            'deskripsi' => '',
            'latitude' => '',
            'longitude' => '',
        ]);
        error_log('simpan Studio:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'STUDIO-UPDATE';
        $actionLogModel->request = json_encode($actionData);

        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }

        $studio = [];
        //        $studio = User::create($data  );
        $studioModel = StudioModel::find($data['studio_id']);
        $studioModel->nama = $data['nama'];
        $studioModel->alamat = $data['alamat'];
        $studioModel->deskripsi = $data['deskripsi'];
        $studioModel->latitude = $data['latitude'];
        $studioModel->longitude = $data['longitude'];
        $studioModel->updated_by = auth()->user()->email;
        $studioModel->update();

        $resp = response(['rc' => '000', 'studio' => new ProjectResource($studio), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function delete_studio(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'studio_id' => 'required|numeric|min:0|not_in:0',
        ]);
        error_log('simpan Studio:'.json_encode($data));
        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'STUDIO-DELETE';
        $actionLogModel->request = json_encode($actionData);
        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $studio = [];
        $studioModel = StudioModel::find($data['studio_id']);
        $studioModel->status = 'DEL';
        $studioModel->updated_by = auth()->user()->email;
        $studioModel->update();

        $resp = response(['rc' => '000', 'studio' => new ProjectResource($studio), 'message' => 'Created successfully']);
        $actionLogModel->response = json_encode($resp);
        $actionLogModel->save();

        return $resp;
    }

    public function save(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'stasiun_id' => '',
            'nama' => 'required|max:255',
            'kode' => 'required|max:255',
            'alamat' => '',
            'deskripsi' => '',
            'latitude' => '',
            'longitude' => '',
        ]);
        $data['stasiun_id'] = (array_key_exists('stasiun_id', $data) ? $data['stasiun_id'] : '1');
        $data['stasiun_id'] = ((strlen($data['stasiun_id']) > 0) ? $data['stasiun_id'] : '1');
        $data['alamat'] = (array_key_exists('alamat', $data) ? $data['alamat'] : '');
        $data['deskripsi'] = (array_key_exists('deskripsi', $data) ? $data['deskripsi'] : '');
        $data['latitude'] = (array_key_exists('latitude', $data) ? $data['latitude'] : '0');
        $data['longitude'] = (array_key_exists('longitude', $data) ? $data['longitude'] : '0');

        $actionData = $data;
        $actionLogModel = new ActionLogModel;
        $actionLogModel->user_name = auth()->user()->email;
        $actionLogModel->action = 'STUDIO-SAVE';
        $actionLogModel->request = json_encode($actionData);

        $valid = 1;
        if ($validator->fails()) {
            $resp = response(['rc' => '001', 'message' => $validator->errors(), 'Validation Error']);
            $actionLogModel->response = json_encode($resp);
            $actionLogModel->save();

            return $resp;
        }
        $studio = [];
        //        $studio = User::create($data  );
        $studioModel = new StudioModel;
        $studioModel->stasiun_id = $data['stasiun_id'];
        $studioModel->nama = $data['nama'];
        $studioModel->kode = $data['kode'];
        $studioModel->alamat = $data['alamat'];
        $studioModel->deskripsi = $data['deskripsi'];
        $studioModel->latitude = $data['latitude'];
        $studioModel->longitude = $data['longitude'];
        $studioModel->created_by = auth()->user()->email;
        $studioModel->save();

        $resp = response(['rc' => '000', 'studio' => new ProjectResource($studio), 'message' => 'Created successfully']);
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
        $studio = User::where('id', '=', $id)->first();

        return response(['rc' => '000', 'studioi' => new ProjectResource($studio), 'message' => 'Show detail successfully']);
    }

    public function detail_studio(Request $request)
    {
        $dt_body = $request->all();
        error_log('request detail studio:'.json_encode($dt_body));
        $studio_id = (array_key_exists('studio_id', $dt_body) ? $dt_body['studio_id'] : '-1');

        $conditions = [];
        $dt = ['studio.id', '=', $studio_id];
        array_push($conditions, $dt);

        $selected = ['studio.*', 'stasiun.nama as nama_stasiun'];
        $studio = StudioModel::join('stasiun', 'stasiun.id', '=', 'studio.stasiun_id')
            ->where($conditions)
            ->get($selected);
        $data = [];
        if (strlen($studio) > 0) {
            $data = $studio[0];
        }

        return response(['rc' => '000', 'data' => $data, 'message' => 'Retrieved successfully']);
    }
}
