<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TopUp;
use App\TopTopupUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        $data = "";
        return view('home.landing', compact('data'));
    }

    public function getTopUser()
    {
        $data = $this->fetchService->userInformation();
        return "success";
    }

    public function fetchData()
    {
        $data = $this->fetchService->userInformation();
        return view('home.landing', compact('data'));
    }

    public function search(Request $request)
    {
        $value = $request->get('username');
        $data = $this->fetchService->searchUserName($value);
        return view('home.landing', compact('data'));
    }
}
