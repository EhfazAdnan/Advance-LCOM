<?php
namespace App\Helpers;
use App\Models\User;
use App\Helpers\GravatarHelper;

class ImageHelper{
    public static function getUserImage($id){
        $user = User::find($id);
        $avatar_url = "";
        if(!is_null($user)){
            if($user->avatar == NULL){
                // return him gravatar image
                if(GravatarHelper::validate_gravatar($user->email)){
                    $avatar_url = GravatarHelper::gravatar_image($user->email, 50);
                }else{
                    // when their is no gravatar image
                    $avatar_url = url('images/defaults/user.png');
                }
            }else{
                // return that image
                $avatar_url = url('images/users/'.$user->avatar);
            }
        }else{
            return redirect('/');
        }

        return $avatar_url;
    }
}