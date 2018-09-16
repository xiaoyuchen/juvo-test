<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;

use GuzzleHttp\Client;
//require 'vendor\autoload.php';

class AlbumController extends Controller
{
    
    
    /**
	 * Load album from api and save or update to database
	 *
	 * @return sucess
	 */
	public function loadAlbumFromAPI()
	{
        //sucess flag
        $sucess = true;
        
        //call api by using apiclient
        $client = new Client();
        $request = $client->get('https://jsonplaceholder.typicode.com/albums');
        $response = $request->getBody()->getContents();
        $albumsArray = json_decode($response);
         
        //loop the result, check if album exsit        
        foreach ($albumsArray as $albumItem) {
            $albumId = $albumItem->id;
            
            //make sure the album id is in correct format
            if ($albumId !='' && $albumId >0){
                //try to find album with id
                $album = Album::find($albumId);
                
                //check is the album exsits in the DB
                if ($album == null){
                    //create a new album model assign  values to the album
                    $sucess = $this -> saveAlbumToDB($albumItem);
                }else{
                    //update album
                    $album->userId = $albumItem -> userId;
                    $album->id = $albumItem -> id;
                    $album->title = $albumItem -> title;
                    //save album
                    $album -> save();
                }
            }
            
        }

        
        //return sucess ture if no exception, otherwise return false
        return $sucess;
    }
    
    
    /**
	 * Load photo from api and save or update to database
	 *
	 * @return sucess
	 */
	public function loadPhotoFromAPI()
	{
        //sucess flag
        $sucess = true;
        
        //call api by using apiclient
        $client = new Client();
        $request = $client->get('https://jsonplaceholder.typicode.com/photos');
        $response = $request->getBody()->getContents();
        $photosArray = json_decode($response);
         
        //loop the result, check if photo exsit        
        foreach ($photosArray as $photoItem) {
            $photoId = $photoItem -> id;
            
            //make sure the photo id is in correct format
            if ($photoId !='' && $photoId >0){
                //try to find photo with id
                $photo = Photo::find($photoId);
                
                //check is the photo exsits in the DB
                if ($photo == null){
                    //create a new photo model assign  values to the photo
                    $sucess = $this -> savePhotoToDB($photoItem);
                }else{
                    //update photo
                    $photo->albumId = $photoItem -> albumId;
                    $photo->id = $photoItem -> id;
                    $photo->title = $photoItem -> title;
                    $photo->url = $photoItem -> url;
                    $photo->thumbnailUrl = $photoItem -> thumbnailUrl;
                    //save photo
                    $photo -> save();
                }
            }
            
        }
        
        //return sucess ture if no exception, otherwise return false
        return $sucess;
    }
    
    /**
	 * Load photo from api and save or update to database
	 *
	 * @return sucess
	 */
	public function saveAlbumToDB($albumItem)
	{
        //try to save the album to DB
        $newAlbum = new Album;
        $newAlbum->userId = $albumItem -> userId;
        $newAlbum->id = $albumItem -> id;
        $newAlbum->title = $albumItem -> title;
        //save the new album
		try{
        	$newAlbum->save();
		}
		catch (Exception $e) {
			return false;
		}
        
        return true;
    }
    
    
    /**
	 * Load photo from api and save or update to database
	 *
	 * @return sucess
	 */
	public function savePhotoToDB($photoItem)
	{
        //check is the associated album in the DB
        $albumId = $photoItem->albumId;
            
        //make sure the album id is in correct format
        if ($albumId !='' && $albumId >0){
            //try to find album with id
            $album = Album::find($albumId);

            //check is the album exsits in the DB
            if ($album != null){
                //create a new photo model
                $newPhoto = new Photo;
                $newPhoto->albumId = $photoItem -> albumId;
                $newPhoto->id = $photoItem -> id;
                $newPhoto->title = $photoItem -> title;
                $newPhoto->url = $photoItem -> url;
                $newPhoto->thumbnailUrl = $photoItem -> thumbnailUrl;

                
                //save new photo to associated album
                try{
                    $album->photos()->save($newPhoto);
                    //$newPhoto -> save();
                    //$newPhoto->album()->associate($newPhoto)->save();
                    
                }
                catch (Exception $e) {
                    return false;
                }   
            }
        }
        
        return true;
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
	 * @param  int  $albumId
	 * @return View
	 */
	public function photoList($albumId)
	{

		
		return view('album.photolist');
	}
    
    
}
