<?php

namespace DuoSytem\Http\Controllers;

use Illuminate\Http\Request;
use DuoSytem\Model\Atividade as Atividade;

class AppController extends Controller
{
    public function index ()
    {
        $flights = Atividade::all();
        return $flights;
    }
}
