<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Item;



class DashboardController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {



    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function myHome()

    {
        
        return view('admin/dashboard');

    }



    /**

     * Show the my users page.

     *

     * @return \Illuminate\Http\Response

     */

    public function test()

    {

        return view('admin/test');

    }

}
