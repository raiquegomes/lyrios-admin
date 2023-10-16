<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class TicketSupportItems extends Model
{
    use HasFactory;

    protected $dates = ['date_validated'];
    protected $fillable = [
       'ticket_support_id', 'name', 'date_validated', 'Qty', 'EAN', 'safe_price', 'internal_id', 'filial', 'comprador', 'status', 'completed_at'
    ];

    public function ticket()
    {
        return $this->belongsTo(TicketSupport::class);
    }

    public function atendente() {
        return $this->belongsTo(User::class);
    }

    public function scopeCreatedWithinLastDays($query, $days)
    {
        $startDate = Carbon::now()->subDays($days)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    public function getResponseTimeAttribute()
    {
        $created_at = Carbon::parse($this->completed_at);
        $completed_at = Carbon::parse($this->created_at);

        if ($this->completed_at) {
            return $completed_at->diffInSeconds($created_at);
        }
        
        return null; // Ticket not yet responded
    }
}
