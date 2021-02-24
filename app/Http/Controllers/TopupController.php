<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TopUp;
use App\TopTopupUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\TopUserFinder;
use App\Services\FetchTopUser;



class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fetchService;


    public function __construct(FetchTopUser $fetchService)
    {
        $this->fetchService = $fetchService;
    }

    // public function index()
    // {
    //     $data = "";
    //     $name = "";
    //     return view('home.landing', compact('data,name'));
    // }

    public function getTopUser()
    {
        $data = $this->fetchService->userInformation();

        return "success";
    }

    public function fetchData()
    {
        $job = (new TopUserFinder($this->fetchService))->delay(1);
        $this->dispatch($job);

        $data = $this->fetchService->getTopUser();
        //$data = "";
        $name = '';
        $email = "";
        $minuser = "";
        $maxuser = "";

        return view('home.landing', compact('data', 'name', 'email', 'minuser', 'maxuser'));
    }


    public function search(Request $request)
    {
        // $value = $request->get('username');
        $name = isset($request->username) ? $request->username : '';
        $email = isset($request->email) ? $request->email : '';
        $minuser = isset($request->minuser) ? $request->minuser : '';
        $maxuser = isset($request->maxuser) ? $request->maxuser : '';

        $data = $this->fetchService->searchUserName($name, $email, $minuser, $maxuser);

        return view('home.landing', compact('data', 'name', 'email', 'minuser', 'maxuser'));
    }
}
