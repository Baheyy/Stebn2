<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeStation extends Model {

    protected $fillable = ['BatchSize', 'location', 'maxCapacity', 'functional'];

    /**
     * This is the one-to-many relationship between Bike and BikeStation, in which we can call
     * the bike's bike station like this: $bike->bikeStation->toArray(); to view all its bikeStation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function bikes()
    {
        return $this->hasMany('App\Bike');
    }

}
