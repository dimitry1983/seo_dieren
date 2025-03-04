<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Inbox extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'inboxes';

    // The attributes that are mass assignable.
    protected $fillable = [
        'advertisement_id',
        'title',
        'message',
        'mark_as_read',
        'from_id',
        'to_id',
        'sender_id',
        'read_by_sender',
        'read_by_receiver',
        'thread_id',
        'deleted_by_user',
        'deleted_by_owner',
    ];

    // Define the relationship to the Advertisement model
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    // Define the relationship to the User model (from_id)
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public static function getCountOpenMessages(){
        return Inbox::where('mark_as_read', 0)->where('to_id', Auth::user()->id)->count();
    }

    // Define the relationship to the User model (to_id)
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_id');
    }

    // Define the relationship to the User model (sender_id)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}