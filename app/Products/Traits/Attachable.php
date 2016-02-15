<?php

namespace App\Products\Traits;

use App\Products\Attachment;

trait Attachable
{
    public function attachments()
    {
        return $this->hasMany(Attachment::class)->orderBy('order', 'ASC');
    }

    public function addAttachment($url)
    {
        $attachment = $this->attachments()->create([
            'path' => $url,
        ]);
        $lastAttachment = $this->attachments->last();
        $attachment->order = $lastAttachment->order + 1;
        $attachment->save();

        return $attachment;
    }

    public function removeAttachment($id)
    {
        return $this->attachments()->find($id)->delete();
    }

    public function moveAttachment($id, $direction)
    {
        $method = ($direction == 'up') ? 'decrement' : 'increment';

        return $this->attachments()->find($id)->{$method}('order');
    }
}
