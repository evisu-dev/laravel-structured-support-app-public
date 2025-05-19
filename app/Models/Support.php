<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\SupportStatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property SupportStatusType $status
 * @property int $customer_id
 * @property string $subject
 * @property string $description
 * @property string $first_contact_user_id
 * @property string $first_contact_memo
 * @property mixed $id
 */
class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'subject',
        'description',
        'status',
        'first_contact_user_id',
        'first_contact_memo',
    ];

    protected $casts = [
        'status' => SupportStatusType::class,
    ];

    public function statusLogs(): HasMany
    {
        return $this->hasMany(SupportStatusLog::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function firstContactUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'first_contact_user_id');
    }
}
