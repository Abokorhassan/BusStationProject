<?php namespace App;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentTaggable\Taggable;


class User extends EloquentUser {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'users';

	/**
	 * The attributes to be fillable from the model.
	 *
	 * A dirty hack to allow fields to be fillable by calling empty fillable array
	 *
	 * @var array
	 */
    use Taggable;

	protected $fillable = [];
	protected $guarded = ['id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $appends = ['full_name'];
    public function getFullNameAttribute()
    {
        return str_limit($this->first_name . ' ' . $this->last_name, 30);
    }
    public function country() {
        return $this->belongsTo( Country::class );
    }

	public function tests() {
		return $this->hasMany('App\Test');
	}

	public function bus()
	{
		return $this->hasMany(Bus::class);
	}

	public function reserve()
	{
		return $this->hasMany(Reserve::class);
	}
	public function driver()
	{
		return $this->hasMany(Driver::class);
	}
	public function busstop()
	{
		return $this->hasMany(Busstop::class);
	}
	public function accident()
	{
		return $this->hasMany(Accident::class);
	}
	public function station()
    {
        return $this->belongsTo(Station::class);
	}
	public function rider()
	{
		return $this->hasMany(Rider::class);
	}
	public function schedule()
	{
		return $this->hasMany(Schedule::class);
	}
}
