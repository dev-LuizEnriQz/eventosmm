<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Quote;

class QuoteObserver
{
    public function saved(Quote $quote)
    {
        if($quote->status ==='approved' || $quote->status === 'pending') {
            //Sincronizar la cotizacion con el evento correspondiente
            Event::updateOrCreate(
                ['quote_id' => $quote->id], //Buscar por el ID de la cotizacion
                [
                    'client_id' => $quote->client_id,
                    'client_name' => $quote->client_name,
                    'client_company' => $quote->client_company,
                    'guests' => $quote->guests,
                    'event_type' => $quote->event_type,
                    'event_date' => $quote->event_date,
                    'package_type' => $quote->package_type,
                    'description' => $quote->description,
                    'status' => $quote->status,
                    'folio' => $quote->folio,
                ]
            );
        }
    }
    /**
     * Handle the Quote "created" event.
     */
    public function created(Quote $quote): void
    {
        //
    }

    /**
     * Handle the Quote "updated" event.
     */
    public function updated(Quote $quote): void
    {
        //
    }

    /**
     * Handle the Quote "deleted" event.
     */
    public function deleted(Quote $quote): void
    {
        //
    }

    /**
     * Handle the Quote "restored" event.
     */
    public function restored(Quote $quote): void
    {
        //
    }

    /**
     * Handle the Quote "force deleted" event.
     */
    public function forceDeleted(Quote $quote): void
    {
        //
    }
}
