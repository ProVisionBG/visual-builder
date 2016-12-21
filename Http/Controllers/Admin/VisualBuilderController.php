<?php

/*
 * ProVision Administration, http://ProVision.bg
 * Author: Venelin Iliev, http://veneliniliev.com
 */

namespace ProVision\VisualBuilder\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;
use ProVision\VisualBuilder\Http\Requests\IndexRequest;
use ProVision\VisualBuilder\Http\Requests\VisualEditorRequest;

class VisualBuilderController extends BaseAdministrationController
{
    public function __construct()
    {
        \Administration::setTitle('Visual Builder');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        //repair language
        $field = str_ireplace(['[', ']'], ['.', ''], $request->field);
        $fieldArray = explode('.', $field);

        $object = new $request->model;
        if (count($fieldArray) == 2) {
            //use languages
            $object = $object->where('id', $request->id)->first()->translate($fieldArray[0]);
            $content = $object->$fieldArray[1];
        } elseif (count($fieldArray) == 1) {
            //without language
            $object = $object->where('id', $request->id)->first();
            $content = $object->$fieldArray[0];
        } else {
            die('field ERROR!!!!');
        }

        return view('visual-builder::index2', compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndexRequest $request)
    {
        //repair language
        $field = str_ireplace(['[', ']'], ['.', ''], $request->field);
        $fieldArray = explode('.', $field);

        $object = new $request->model;
        if (count($fieldArray) == 2) {
            //use languages
            $object = $object->where('id', $request->id)->first()->translate($fieldArray[0]);
            $object->$fieldArray[1] = trim($request->input('content'));
        } elseif (count($fieldArray) == 1) {
            //without language
            $object = $object->where('id', $request->id)->first();
            $object->$fieldArray[0] = trim($request->input('content'));
        } else {
            die('field ERROR!!!!');
        }

        $object->save();

        return response()->json(['ok']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
