<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;


use Illuminate\Http\Request;

class FooController extends Controller {

    // private $repo;

    // function __construct(FooRepository $repo)
    // {
    //     $this->repo = $repo;
    // }
	public function foo(FooRepository $repo)
    {

        return $repo->get();
        
    }

}
