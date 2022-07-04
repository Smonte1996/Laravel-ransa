<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    /**
     * Get all of the responsibles.
     */
     public function responsibles()
    {
        return $this->morphMany(Responsible::class, 'responsibleable')->with('employee');
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


}
