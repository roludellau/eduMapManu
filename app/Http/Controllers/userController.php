<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    private string $email;
    private string $password;
    private string $password2;
    private string $emailValidationToken;
    private Request $request;
    private string $regexPassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[À-ÖØ-öø-ÿ@$!%*#?:&µ£~§\/\\~|\-]).{8,100}$/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Vérifie les données entrées par l'utilisateur, juste côté serveur.
     *
     * @return View
     */
    public function validateRegistration(Request $request):View{
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password2');


        $errorList = [];
        $success =false;
        $fail = false;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorList['email'] = 'L\'adresse mail entrée n\'est pas valide.';
        }
        if (!preg_match($this->regexPassword, $password)){
            $errorList['password'] = 'Le mot de passe doit au moins contenir: 8 caractères, une majuscule, et un caractère spécial.';
        }
        if (!$password === $password2){
            $errorList['passwordMatch'] = 'Les deux mots de passe de correspondent pas.';
        }

        if(empty($errorList)){
            if(!(User::whereEmail($email)->first())){
                $user = new User();
                $user->email = $email;
                $user->password = app('hash')->make($password);
                $success = $user->save();
                auth()->login($user);
            }else{
                $fail = true;
            }
        }else{
            $fail=true;
        }

        return view('inscription', [
            'defaultEmail' => $email,
            'success' => $success,
            'fail' => $fail
        ]);

    }

    public function connexion(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if($user = User::whereEmail($email)->first()){
            if(Hash::check($password, $user->password)){
                auth()->login($user);
                return view('accueil');
            }
        }
    }

}
