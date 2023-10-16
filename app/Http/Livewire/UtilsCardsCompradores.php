<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Carbon\Carbon;
use Carbon\CarbonInterval;

use App\Models\User;
use App\Models\TicketSupportItems;


class UtilsCardsCompradores extends Component
{
    public function render()
    {

        $attendants = User::where('current_team_id', 7)->orderBy('name')->get(); // Adjust this based on your Attendant model
        
        $responseTimes = [];

        foreach ($attendants as $attendant) {
            $tickets = TicketSupportItems::where('comprador', $attendant->id)
                ->whereNotNull('completed_at')
                ->createdWithinLastDays(7)
                ->get();

            $totalResponseTime = 0;
            $ticketCount = $tickets->count();

            foreach ($tickets as $ticket) {
                $responseTime = Carbon::parse($ticket->completed_at)->diffInSeconds($ticket->created_at);
                $totalResponseTime += $responseTime;
            }

            $averageResponseTime = $ticketCount > 0 ? $totalResponseTime / $ticketCount : 0;

            $responseTimes[] = [
                'attendant' => $attendant->name,
                'departamento' => $attendant->departamento,
                'profile_photo_path' => $attendant->profile_photo_path,
                'average_response_time' => $averageResponseTime,
            ];
        }

        return view('dashboard.utils.compradores.utils-cards-compradores', compact('responseTimes'));
    }
}
