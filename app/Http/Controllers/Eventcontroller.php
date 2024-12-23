<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Eventcontroller extends Controller
{
    public function index()
    {
        $retrieveEventOpen = Event::where('statuspelaksanaan', 1)
            ->orderBy('id')
            ->get();
        $isiEventOpen = $retrieveEventOpen->filter(function ($event) {
            $imagePath = public_path('pendaftaran/' . $event->image);
            return !empty($event->image) && File::exists($imagePath);
        });

        $retrieveEvent = Event::orderByDesc('id')->get();
        $isiEvent = $retrieveEvent->filter(function ($event) {
            $imagePath = public_path('pendaftaran/' . $event->image);
            return !empty($event->image) && File::exists($imagePath);
        });

        // Now paginate the filtered collection manually
        $perPage = 9; // Number of items per page
        $page = request()->get('page', 1); // Get the current page or default to 1
        $paginatedEvents = $isiEvent->forPage($page, $perPage);
        $total = $isiEvent->count();

        $isiEventPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedEvents,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('event.index', [
            'title' => 'Event',
            'isiEventCount' => $isiEvent,
            'isiEvent' => $isiEventPaginated,
            'isiEventOpen' => $isiEventOpen
        ]);
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $event = Event::where('judul', 'like', '%' . $search . '%')
            ->orWhere('tanggalpelaksanaan', 'like', '%' . $search . '%')
            ->paginate(9);
        $isiEventCount = $event;

        return view('event.index', [
            'title' => 'Event',
            'isiEventCount' => $isiEventCount,
            'isiEventOpen' => $isiEventCount,
            'search' => $search,
            'isiEvent' => $event
        ]);
    }

    public function show(Event $isiEvent)
    {
        $rekomendasi = Event::orderByDesc('id')
        ->paginate(3);
        
        if ($isiEvent->statuspelaksanaan === 1) {
            return view('event.isievent', [
                'event' => $isiEvent,
                'title' => 'Event',
                'rekomendasi' => $rekomendasi,
            ]);
        } else {
            return view('event.ditutup', [
                'event' => $isiEvent,
                'title' => 'Event',
                'rekomendasi' => $rekomendasi,
            ]);
        }
    }

    public function showsertif()
    {
        return view('comingsoon', [
            'title' => 'Sertifikat Event'
        ]);
    }
}
