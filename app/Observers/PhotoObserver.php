<?php

namespace App\Observers;

use App\Models\Photo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoObserver
{
    /**
     * Handle the Photo "created" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function created(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "updated" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function updated(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "deleted" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function deleted(Photo $photo)
    {
        try {
            Storage::delete($photo->file);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), [
                'exception' => $exception,
            ]);
        }
    }

    /**
     * Handle the Photo "restored" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function restored(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "force deleted" event.
     *
     * @param \App\Models\Photo $photo
     * @return void
     */
    public function forceDeleted(Photo $photo)
    {
        //
    }
}
