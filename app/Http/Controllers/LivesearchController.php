<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LivesearchController extends Controller
{
    function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
    	// echo "string"; exit();
    
     
      $output = '';
      $query = $request->get('query'); 
      if($query != '')
      {
 
       $data = DB::table('tbl_customers')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orWhere('phone', 'like', '%'.$query.'%')
         ->get();

      }
      else
      {
       $data = DB::table('tbl_customers')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->address.'</td>
         <td>'.$row->phone.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     
    }
}