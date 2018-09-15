<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    
    
    /**
	 * Load album from api and save or update to database
	 *
	 * @return sucess
	 */
	public function loadAlbumFromAPI()
	{
        //call api by using apiclient
                
        //loop the result, check if album exsit
        
        //if album exsit load date to model, update the album model and save it
        
        //if album not exsit create a new album model and save it
        
        //return sucess ture if no exception
        
        //return sucess false if has exception
        
    }
    
    
    /**
	 * Load photo from api and save or update to database
	 *
	 * @return sucess
	 */
	public function loadPhotoFromAPI()
	{
        //call api by using apiclient
        
        
        //check if associated album exsit
        
        //if the album exsit load data to model, add photo to album, and save it
        
        //if the album not exsit dont save
        
        //return sucess ture if no exception
        
        //return sucess false if has exception
    }
    
    /**
	 * Load photo from api and save or update to database
	 *
	 * @return sucess
	 */
	public function saveAlbumToDB(album)
	{
        //try to save the album to DB
        
        //return sucess ture if no exception
        
        //return sucess false if has exception
    }
    
    
    /**
	 * Load photo from api and save or update to database
	 *
	 * @return sucess
	 */
	public function savePhotoToDB(album,photo)
	{
        //try to save the photo to DB
        
        //return sucess ture if no exception
        
        //return sucess false if has exception
    }
    
    
    /**
	 * Show album list view
	 *
	 * @return View
	 */
	public function albumList()
	{

		
		return view('album.albumlist');
	}
    
    /**
	 * Show the photos of a album by its id
	 *
	 * @param  int  $album_id
	 * @return View
	 */
	public function photoList($album_id)
	{

		
		return view('album.photolist');
	}
    
    
}
