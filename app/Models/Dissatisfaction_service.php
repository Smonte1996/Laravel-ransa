<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dissatisfaction_service extends Model
{
    use HasFactory;
    protected $fillable = ['name','activity_id','notification_type','created_at','updated_at'];

    /**
     * Get the activity that owns the Dissatisfaction_service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

/**
     * The actions that belong to the Dissatisfaction_service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function client()
    {
        return $this->belongsToMany(Client::class);
    }

    /**
     * The actions that belong to the Dissatisfaction_service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }
     
    public  function wharehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    /**
     * Get all of the responsibles.
     */
     public function responsibles()
    {
        return $this->morphMany(Responsible::class, 'responsibleable')->with('employee');
    }
     
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeResponsable_id')->with('employee');
    }
    /**
     * Get all of the notification_service for the Dissatisfaction_service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notification_service()
    {
        return $this->hasMany(Notification_service::class);
    }

    public static function getResponsableByClienteId($clienteId, $alamcenId = null)
    {
        $data = [];
        // Responsable
        $idResponsables = DB::table('client_employee')->where('client_id', $clienteId)->get();
        $ids_responsables = array_map(fn($value) => $value->employee_id, $idResponsables->toArray());
        $responsableLikeUsers = User::whereIn('userable_id', $ids_responsables)->get();
        $responsableLikeEmployee = Employee::whereIn('id', $ids_responsables)->get();

        foreach ($responsableLikeUsers as $key => $value) {
            $responsableLikeEmployee[$key]->nombres = $value->name;
            $responsableLikeEmployee[$key]->email = $value->email;
        }
       
        $res = $responsableLikeEmployee;

        if ($alamcenId != null) {
            $res = $responsableLikeEmployee->where('warehouse_id', $alamcenId);
        }
        
        $data["responsables"] = $res->all();
        
        //Lider
        $lider_id = null;
        if (count($data["responsables"])) {
            $data["responsables"] = array_values($data["responsables"]);
            $lider_id = Employee::where('id', $data["responsables"][0]->id)->first()->parent_id;
        }
        if (!empty($lider_id)) {
            $liderLikeUser = user::where('userable_id', $lider_id)->first();
            $data["lider"]["nombre"] = $liderLikeUser->name;
            $data["lider"]["email"] = $liderLikeUser->email;
        }
        return $data;
    }
}
