<?php

namespace App\Console\Commands;

use App\Products\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        $attachments = DB::table('attachments')->orderBy('order')->get();

        foreach ($attachments as $attachment) {
            Product::find($attachment->product_id)->addMediaFromUrl(cdn_file($attachment->path))->toCollection('attachments');;
        }

        $products = DB::table('products')->get();

        foreach ($products as $product) {
            Product::find($product->id)->addMediaFromUrl(cdn_file($product->image_path))->toCollection('product_images');;
        }

        $products = \App\Products\Product::with('provider')->get();

        $json = [];

        foreach ($products as $product) {
            $json[] = ['id' => $product->id, 'link' => $product->provider->link()];
        }

        var_dump(json_encode($json));
    }
}
