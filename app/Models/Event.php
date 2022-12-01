<?php

namespace App\Models;

use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, MediaAlly;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gol_id', 'topic_id', 'name', 'banner', 'programmed_at', 'status', 'start_at', 'end_at'];

    protected function getStartAtAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->start_at)->format('H:i');
    }

    protected function getEndAtAttribute()
    {
        return  Carbon::createFromFormat('H:i:s', $this->end_at)->format('H:i');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function gol()
    {
        return $this->belongsTo(Gol::class);
    }

    public function getBanner(): string
    {
        return $this->fetchFirstMedia()->file_url ?? "";
    }
}
