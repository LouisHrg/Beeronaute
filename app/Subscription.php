<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Eloquent
{

	use SoftDeletes;

	protected $casts = [
		'event' => 'int',
		'bar' => 'int',
		'type' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'event',
		'bar',
		'type',
		'user_id'
	];

	public function place()
	{
		return $this->belongsTo(\App\Bar::class, 'bar');
	}

	public function party()
	{
		return $this->belongsTo(\App\Event::class, 'event');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
}
