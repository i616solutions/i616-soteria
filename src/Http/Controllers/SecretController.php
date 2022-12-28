<?php

namespace i616\Soteria\Http\Controllers;

use App\Http\Controllers\Controller;
use i616\Soteria\Models\Payload;
use i616\Soteria\Models\Secret;
use i616\Soteria\Models\Template;
use i616\Soteria\Models\Vault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SecretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('soteria::secrets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vault $vault)
    {
        $template = Template::find('980bf0fc-945e-43f6-8c1d-01867cc63afc');

        return view('soteria::secrets.create')
            ->with('template', $template)
            ->with('vault', $vault);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vault $vault)
    {
        $template = Template::find('980bf0fc-945e-43f6-8c1d-01867cc63afc');

        $secret = new Secret();
        $secret->name = $request->input('name');
        $secret->vault_id = $vault->id;
        $secret->template_id = $template->id;

        foreach ($template->fields as $field) {
            if ($field->is_secret == false) {
                $data[$field->name] = $request->input($field->name);
            } else {
                $payload[$field->name] = $request->input($field->name);
            }
        }
        $secret->data = json_encode($data);
        $secret_payload = json_encode($payload);
        $secret->save();

        switch (config('soteria.secret_storage')) {
            case 'database':
                //do db update
                $payload = new Payload;
                $payload->vault_id = $vault->id;
                $payload->secret_id = $secret->id;
                $payload->payload = Crypt::encryptString($secret_payload);
                $payload->save();
                break;
            case 'azure':
                //do fancy azure shit
                break;
            case 'aws':
                //do fancy aws shit
                break;
            default:
                //throw exception
                exit;
                exit;
        }

        return redirect('vault/'.$vault->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secrets  $secrets
     * @return \Illuminate\Http\Response
     */
    public function show(Vault $vault, Secret $secret)
    {
        $template = Template::find('980bf0fc-945e-43f6-8c1d-01867cc63afc');

        $fields = json_decode($secret->data, true);
        // rebuilt the payload fields and add them to the fields array.  Add them without values so users cannot view /source to get secrets.
        $payload_fields = json_decode(Crypt::decryptString($secret->payload->payload), true);
        foreach ($payload_fields as $key => $value) {
            $fields[$key] = '';
        }

        return view('soteria::secrets.show')
            ->with('secret', $secret)
            ->with('vault', $vault)
            ->with('fields', $fields)
            ->with('template', $template);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secrets  $secrets
     * @return \Illuminate\Http\Response
     */
    public function edit(Vault $vault, Secret $secret)
    {
        $template = Template::find('980bf0fc-945e-43f6-8c1d-01867cc63afc');

        $fields = json_decode($secret->data, true);

        // rebuilt the payload fields and add them to the fields array.  Add them without values so users cannot view /source to get secrets.
        $payload_fields = json_decode(Crypt::decryptString($secret->payload->payload), true);
        foreach ($payload_fields as $key => $value) {
            $fields[$key] = $value;
        }

        return view('soteria::secrets.edit')
            ->with('secret', $secret)
            ->with('vault', $vault)
            ->with('fields', $fields)
            ->with('template', $template);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secrets  $secrets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vault $vault, Secret $secret)
    {
        $template = Template::find('980bf0fc-945e-43f6-8c1d-01867cc63afc');

        $secret->name = $request->input('name');

        // process data
        foreach ($template->fields as $field) {
            if ($field->is_secret == false) {
                $data[$field->name] = $request->input($field->name);
            } else {
                $payload[$field->name] = $request->input($field->name);
            }
        }
        $secret->data = json_encode($data);
        $secret_payload = json_encode($payload);
        $secret->save();

        // process payload
        switch (config('soteria.secret_storage')) {
            case 'database':
                //do db update
                $payload = $secret->payload;

                $payload->payload = Crypt::encryptString($secret_payload);
                $payload->save();
                break;
            case 'azure':
                //do fancy azure shit
                break;
            case 'aws':
                //do fancy aws shit
                break;
            default:
                //throw exception
                exit;
                exit;
        }

        $secret->save();

        return redirect('/vault/'.$vault->id.'/secret/'.$secret->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secrets  $secrets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secret $secret)
    {
        $vault = $secret->vault_id;
        $secret->delete();

        return redirect('/vault/'.$vault);
    }
}
