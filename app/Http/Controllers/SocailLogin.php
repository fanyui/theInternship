<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
class SocailLogin extends Controller
{
    //
        protected $redirectTo = '/home';

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
       return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {


        $user = Socialite::driver($provider)->user();

        
        // // All Providers
        $userid = $user->getId();
        $userNickname = $user->getNickname();
        $userName = $user->getName();
        $userEmail = $user->getEmail();
        $userAvatar = $user->getAvatar();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
