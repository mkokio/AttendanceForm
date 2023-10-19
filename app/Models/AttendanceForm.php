<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class AttendanceForm extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //mass assignment protection
    protected $fillable = [
        '日付',
        '種別',
        'その他備考',
        '入力者',
        '入力日',
        'タイプ'
    ];
}
