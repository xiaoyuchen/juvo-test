<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AlbumLoader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:album';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load albums from api';

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
        //load album and photos to the database
        \App::call('App\Http\Controllers\AlbumController@loadAlbumFromAPI');
        \App::call('App\Http\Controllers\AlbumController@loadPhotoFromAPI');
    }
}
