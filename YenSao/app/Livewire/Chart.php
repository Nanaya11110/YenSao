<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\ship;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Smalot\PdfParser\Parser;
class Chart extends Component
{
    public $ship;
    public $events;
    public $test;
    public $file;
    public function mount()
    {
        // $parser = new Parser();
        // $this->file = $parser->parseFile('Thong tin so tien ung ho qua so tai khoan VietinBank CT1111 - 111602391111 tu ngay 13 den 15.9.2024.pdf');
        // $text = $this->file->getPages()[0]->getText();
        // $lines = array_filter(array_map('trim', explode("\n", $text)));
        // $lines = array_slice($lines, 5);
        // $json_data = json_encode(
        //     [
        //         'text' => $text,
        //     ],
        //     JSON_PRETTY_PRINT,
        // );

        // // Check if the line contains only uppercase letters, spaces, and/or punctuation
        // if (preg_match('/^[A-Z\s\p{P}]+$/u', $lines[10])) dd('UPPER');
        // else dd('LOWER');

       // dd($lines);
        $this->ship = ship::all();
    }

    #[On('UpdateShip')]
    public function UpdateShipping($id, $start, $end)
    {
        $ship = ship::find($id);
        $ship->created_at = $start;
        $ship->updated_at = $end;
        $ship->save();
    }

    #[On('deleteShip')]
    public function DeleteShip($id)
    {
        $ship = ship::find($id);
        $ship->delete();
        Log::info('new event', $hip = [$this->ship->count()]);
        $this->ship = ship::all();
        $this->dispatch('UpdateCalendar');
    }
    public function render()
    {
        $Color = ['rgb(239 68 68)', 'rgb(234 179 8)', 'rgb(34 197 94)'];
        $lenght = 0;
        $event = [];
        foreach ($this->ship as $ship) {
            $event[] = [
                'id' => $ship->id,
                'title' => $ship->name,
                'start' => Carbon::parse($ship->created_at)->format('Y-m-d H:i:s'),
                'end' => Carbon::parse($ship->updated_at)->format('Y-m-d H:i:s'),
                'backgroundColor' => $Color[$ship->status],
            ];
            $lenght++;
        }
        $this->events = $event;
        Log::info('new event', $hip = [$this->ship->count()]);
        return view('livewire.chart');
    }
}
