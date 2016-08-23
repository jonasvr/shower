<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CropRequest;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class PhotoController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * PhotoController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function postCrop(Request $request)
    {
        $data = $request->all();
        $quality = 90;

        $src  = $data['image'];
        $img  = imagecreatefromjpeg($src);
        $dest = ImageCreateTrueColor($data['w'], $data['h']);

        imagecopyresampled($dest, $img, 0, 0, $data['x'],
            $data['y'], $data['w'], $data['h'],
            $data['w'], $data['h']);
        imagejpeg($dest, $src, $quality);

        $user = Auth::user();
        $user->image_url = $src;
        $user->save();
        session(['success' =>"The picture has been added and cropped."]);

        if (Auth::user()->steps != 2){
            $user->steps++;
            $user->save();
            return redirect()->route('getProfile');
        }else {

            return redirect()->route('realProfile');
        }
    }
}
