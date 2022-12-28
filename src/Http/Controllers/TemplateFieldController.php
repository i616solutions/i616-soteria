<?php

namespace i616\Soteria\Http\Controllers;

use i616\Soteria\Models\Template;
use i616\Soteria\Models\TemplateField;
use Illuminate\Http\Request;

class TemplateFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'soteria::tf.index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Template $template)
    {
        return view('soteria::templatefields.create')
            ->with('template', $template);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Template $template)
    {
        $field = new TemplateField();

        $field->template_id = $template->id;
        $field->name = $request->input('name');
        $field->displayname = $request->input('displayname');
        $field->description = $request->input('description');
        $field->field_type = $request->input('field_type');
        $field->field_options = $request->input('field_options');
        $field->field_order = $request->input('field_order');
        $field->field_validation_rules = $request->input('field_validation_rules');
        $field->is_secret = $request->input('is_secret');

        $field->save();

        return redirect('/template/'.$template->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template, TemplateField $templateField)
    {
        return view('soteria::templatefields.show')
            ->with('template', $template)
            ->with('templateField', $templateField);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template, TemplateField $templateField)
    {
        return view('soteria::templatefields.edit')
            ->with('template', $template)
            ->with('templateField', $templateField);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template, TemplateField $templateField)
    {
        $templateField->name = $request->input('name');
        $templateField->displayname = $request->input('displayname');
        $templateField->description = $request->input('description');
        $templateField->field_type = $request->input('field_type');
        $templateField->field_options = $request->input('field_options');
        $templateField->field_order = $request->input('field_order');
        $templateField->field_validation_rules = $request->input('field_validation_rules');
        $templateField->is_secret = $request->input('is_secret');

        $templateField->save();

        return redirect('/template/'.$template->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template, TemplateField $templateField)
    {
        $templateField->delete();

        return redirect('/template/'.$template->id);
    }
}
