<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Membership;use App\Model\Company;

class ImportExportController extends Controller
{
    /********************************** Membership ***************************************/
    public function memberShipFormat(Request $req,$data=false)
    {
        $header = ['Title', 'Description', 'Price', 'Duration( in year )'];
        $title = 'Membership'.date('Y-m-d H:i:s');
        $f = fopen('php://memory', 'w');
        fputcsv($f, $header, ',');
        if($data == true){
            $memberships = Membership::where('is_active', 1)->get();
            foreach ($memberships as $membership) {
                $lineData = [$membership->title,$membership->description,$membership->price,$membership->duration];
                fputcsv($f, $lineData, ',');
            }
        }
        fseek($f, 0);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$title.'.csv'.'";');
        fpassthru($f);
    }

    public function exportMemberShip(Request $req)
    {
        return $this->memberShipFormat($req);
    }

    public function exportMemberShipWithData(Request $req)
    {
        return $this->memberShipFormat($req,true);
    }

    public function importMembershipWithData(Request $req)
    {
        $rules = [
            'membership' => 'required|mimes:csv',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            \DB::beginTransaction();
            $response = [];$path = $req->file('membership')->getRealPath();$firstline = true;
            try {
                if (($handle = fopen ( $path, 'r' )) !== FALSE) {
                    while (($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                        if($firstline){$firstline = false;continue;}
                        if($data[0] != '' && $data[2] != '' && $data[3] != ''){
                            $membership = new Membership;
                            $membership->title = $data[0];
                            $membership->description = ($data[1]) ? $data[1] : '';
                            $membership->price = $data[2];
                            $membership->duration = $data[3];
                            $membership->save();
                            $response['success'][] = $membership;
                        }else{
                            $response['rejected'][] = $data;
                        }
                    }
                }
                \DB::commit();
                return successResponse('Membership Imported Success',$response);
            } catch (Exception $e) {
                \DB::rollback();
                return errorResponse('Something went wrong please try after some time');
            }
        }
        return errorResponse($validator->errors()->first());
    }

    /********************************** Company ***************************************/
    public function companyFormat(Request $req,$data=false)
    {
        $header = ['Name', 'Description', 'Logo URL'];
        $title = 'Company'.date('Y-m-d H:i:s');
        $f = fopen('php://memory', 'w');
        fputcsv($f, $header, ',');
        if($data == true){
            $company = Company::select('*')->get();
            foreach ($company as $com) {
                $lineData = [$com->name,$com->description,$com->logo];
                fputcsv($f, $lineData, ',');
            }
        }
        fseek($f, 0);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$title.'.csv'.'";');
        fpassthru($f);
    }

    public function exportCompany(Request $req)
    {
        return $this->companyFormat($req);
    }

    public function exportCompanyWithData(Request $req)
    {
        return $this->companyFormat($req,true);
    }

    public function importCompanyWithData(Request $req)
    {
        $rules = [
            'company' => 'required|file|mimes:csv',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            \DB::beginTransaction();
            $response = [];$path = $req->file('company')->getRealPath();$firstline = true;
            try {
                if (($handle = fopen ( $path, 'r' )) !== FALSE) {
                    while (($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                        if($firstline){$firstline = false;continue;}
                        if($data[0] != '' && $data[2] != ''){
                            $company = new Company;
                            $company->name = $data[0];
                            $company->description = ($data[1]) ? $data[1] : '';
                            $company->logo = $data[2];
                            $company->save();
                            $response['success'][] = $company;
                        }else{
                            $response['rejected'][] = $data;
                        }
                    }
                }
                \DB::commit();
                return successResponse('Company Imported Success',$response);
            } catch (Exception $e) {
                \DB::rollback();
                return errorResponse('Something went wrong please try after some time');
            }
        }
        return errorResponse($validator->errors()->first());
    }
}
