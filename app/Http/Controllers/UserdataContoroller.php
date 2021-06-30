<?php

namespace App\Http\Controllers;

use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class UserdataContoroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Userdata::get(['name', 'age']);
        return $datas->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //RESTfullのため必要ない
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Userdata::$rules);
        $userdata = new Userdata;
        $form = $request->all();
        unset($form['_token']);
        $userdata->fill($form)->save();
        $get = $userdata->id;
        return ['id' => $get];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (DB::table('userdata')->where('id', $id)->exists()) {
            $datas = Userdata::find($id, ['name', 'age']);
            return $datas->toArray();
        } else {
            return $this->jsonResponse(["message" => "対象のレコードが見つかりません"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //RESTfullのため必要ない
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
        if (DB::table('userdata')->where('id', $id)->exists()) {
            $datas = Userdata::find($id, ['name', 'age']);
            $datas = $datas->toArray();
            if (isset($request->name)) {
                $datas['name'] = $request->name;
            }
            if (isset($request->age)) {
                $datas['age'] = $request->age;
            }

            $userdata = Userdata::find($request->id);
            $form = $datas;
            unset($form['_token']);
            $userdata->fill($form)->save();
            $get = $userdata->id;
            return ['id' => $get];
        } else {
            return $this->jsonResponse(["message" => "対象のレコードが見つかりません"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('userdata')->where('id', $id)->exists()) {
            Userdata::find($id)->delete();
            return $this->jsonResponse(["message" => "対象のレコードを削除しました。"]);
        } else {
            return $this->jsonResponse(["message" => "対象のレコードが見つかりません"]);
        }
    }
}
