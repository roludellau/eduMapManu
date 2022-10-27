<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

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
    public function __construct(Request $request)
    {
        $this->email = $request->input('email');
        $this->password = $request->input('password');
        $this->password2 = $request->input('password2');
    }

    /**
     * Vérifie les données entrées par l'utilisateur, juste côté serveur.
     *
     * @return View
     */
    public function validateRegistration():View{

        $errorList = [];
        $success =false;
        $fail = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $errorList['email'] = 'L\'adresse mail entrée n\'est pas valide.';
        }
        if (!preg_match($this->regexPassword, $this->password)){
            $errorList['password'] = 'Le mot de passe doit au moins contenir: 8 caractères, une majuscule, et un caractère spécial.';
        }
        if (!$this->password === $this->password2){
            $errorList['passwordMatch'] = 'Les deux mots de passe de correspondent pas.';
        }

        if(empty($errorList)){
            if(!(User::whereEmail($this->email)->first())){
                $user = new User();
                $user->email = $this->email;
                $user->password = $this->password;
                $success = $user->save();
            }else{
                $fail = true;
            }
        }else{
            $fail=true;
        }

        return view('inscription', [
            'defaultEmail' => $this->email,
            'success' => $success,
            'fail' => $fail
        ]);

    }

}
