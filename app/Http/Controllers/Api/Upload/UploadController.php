<?php

namespace App\Http\Controllers\Api\Csv;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Membership;
class UploadController extends Controller
{
    public function memberShipFormat(Request $req,$withdata=false)
    {
        $header = ['Title', 'Description', 'Price', 'Duration( in year )'];
        $title = 'Membership_List';
        $f = fopen('php://memory', 'w');
        fputcsv($f, $header, ',');
        if($withdata == true){
            $memberships = Membership::where('is_active', 1)->get();
            foreach ($memberships as $val) {
                $lineData = [
                    $val->title,
                    $val->description,
                    $val->price,
                    $val->duration,
                ];
                fputcsv($f, $lineData, ',');
            }
        }
        fseek($f, 0);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$title.'.csv'.'";');
        fpassthru($f);
    }

    public function uploadMembership(Request $req)
    {
        if($req->hasFile('membership_csv')){
            $extension= ['csv'];
            $getExtesion = $req->file('membership_csv')->getClientOriginalExtension();
            if(in_array($getExtesion,$extension)){
                $path = $req->file('membership_csv')->getRealPath();
                $firstline = true;
                if (($handle = fopen ( $path, 'r' )) !== FALSE) {
                    while (($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                        if($firstline){
                            $firstline = false;continue;
                        }
                        try{
                            if($data[0] != ''){
                                \DB::beginTransaction();
                                $membership = new Membership;
                                $membership->title = $data[0];
                                $membership->description = $data[1];
                                $membership->price = $data[2];
                                $membership->duration = $data[3];
                                $membership->save();
                                $event[] = [
                                    'error' => false,
                                    'message' => 'csv uploaded','title' => $data[0],
                                ];
                                \DB::commit();
                            }else{
                                $event[] = [
                                    'error' => true,'message' => 'csv not uploaded',
                                    'title' => $data[0],'reason' => 'Title can not be Empty',
                                ];
                            }
                        }catch(Exception $e){
                            $event[] = [
                                'error' => true,'message' => 'csv not uploaded',
                                'title' => $data[0],'reason' => $e,
                            ];
                            \DB::rollback();
                        }
                    }
                    return response()->json([ $event ]);
                }
            }
        } else {
            return response()->json(['error' => true,'message' => 'There is no file found']);
        }
    }
}
