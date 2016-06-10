<?php

namespace App\Console\Commands;

use App\Products\Attachment;
use Illuminate\Console\Command;

class MediaLibraryPatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patch:media-library';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Moves old assets to MediaLibrary';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $attachments = Attachment::orderBy('product_id')->orderBy('order')->with('product')->get();

        foreach($attachments as $attachment){
            $attachment->product->addMediaFromUrl(cdn_file($attachment->path))->toCollection('attachments');
        }
    }
}
