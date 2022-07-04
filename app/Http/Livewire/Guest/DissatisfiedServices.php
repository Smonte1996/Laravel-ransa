<?php

namespace App\Http\Livewire\Guest;

use App\Mail\Notificationservice;
use Livewire\WithFileUploads;

use App\Models\Activity;
use App\Models\Client;
use App\Models\Dissatisfaction_service;
use App\Models\Employee;
use App\Models\Notification_service;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DissatisfiedServices extends Component
{
    use WithFileUploads;

    public $identification_card;
    public $activity_id = "";
    public $dissatisfaction_service_id;
    public $images;
    public $observations;
    public $client_id;

    protected $rules = [

        'identification_card' => 'required',
        'activity_id' => 'required',
        'client_id' => 'required',
        'dissatisfaction_service_id' => 'required'
    ];

    //Obtener datos de la persona quien hace el registro
    public function getEmployeeProperty()
    {
        if (!empty($this->identification_card)) {
            return Employee::where('identification_card', $this->identification_card)->first();
        } else {
            return "";
        }
    }
    //Lista de Servicios no conformes segun la actividad
    public function getDissatisfactionServicesProperty()
    {
        if (!empty($this->activity_id)) {
            return Dissatisfaction_service::where('activity_id', $this->activity_id)->get();
        } else {
            return "";
        }
    }


    //datos del servicio de no conformidad seleccionado
    public function getDissatisfactionServiceProperty()
    {
        if (!empty($this->dissatisfaction_service_id)) {
            return Dissatisfaction_service::find($this->dissatisfaction_service_id);
        } else {
            return null;
        }
    }

    public function save()
    {
        $this->validate();

        $notification_service = Notification_service::create([
            'dissatisfaction_service_id' => $this->dissatisfaction_service_id,
            'employee_id' => $this->employee->id,
            'observations' => $this->observations,
            'client_id' => $this->client_id
        ]);
        if (!is_null($this->images)) {
            foreach ($this->images as $image) {
                $url =  $image->store('notification_service');
                $notification_service->attached_files()->create([
                    'name' => $image->hashName(),
                    'ext' => $image->extension(),
                    'path' => $url
                ]);
            }
        }

        Mail::to('dborborp@ransa.net')->send(new Notificationservice($notification_service));

        return redirect()->route('adm.dashboard');
    }


    public function render()
    {
        $clients = Client::all();
        $activities = Activity::all();
        return view('livewire.guest.dissatisfied-services', compact('clients'))->with(compact('activities'))->layout('layouts.guest');
    }
}
