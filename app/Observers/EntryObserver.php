<?php

namespace App\Observers;

use App\Models\Entry;
use Illuminate\Support\Facades\Bus;

class EntryObserver
{
    public function created(Entry $entry): void
    {
        Bus::dispatchAfterResponse(function () use ($entry) {
            $entry->budget?->updateSummary();
        });
    }

    public function updated(Entry $entry): void
    {
        Bus::dispatchAfterResponse(function () use ($entry) {
            $entry->budget?->updateSummary();
        });
    }

    public function deleted(Entry $entry): void
    {
        Bus::dispatchAfterResponse(function () use ($entry) {
            $entry->budget?->updateSummary();
        });
    }
}
