<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model {

    protected $fillable = ['type', 'bike_station_id', 'vendor', 'features', 'model'];

    /**
     * This is the one-to-many relationship between Bike and BikeStation, in which we can call
     * the bike station's bikes like this: $bikeStation->bikes->toArray(); to view all its bikes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bikeStation()
    {
        return $this->belongsTo('App\BikeStation');
    }

    /**
     * Gets the users associated with a certain bike.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}

