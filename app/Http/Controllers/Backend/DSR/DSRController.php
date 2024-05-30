<?php

namespace App\Http\Controllers\Backend\DSR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use \Carbon\Carbon;
use DB;


class DSRController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }


public function varifyemail(Request $request)
{
      if($request->ajax()){

         $email = DB::table('dsr_lists')->where('email', $request->email)->get();

         if($request->hiddenID){
             $hiddenID = Crypt::decrypt($request->hiddenID);
          
             $check = DB::table('dsr_lists')->where('email', $request->email)
                     ->whereNotIn('id',[$hiddenID])
                     ->get();
             if (count($check) > 0) {
                 echo 'false';
             }else{
                 echo 'true';
 
             }

         }else{
             if (count($email) > 0) {
                 echo 'false';
             }else{
                 echo 'true';
 
             }
         }

      }else{
          toastr()->error('Opps!Something went wrong');
         return redirect()->back();
      }


}


public function varifyuserName(Request $request)
{
   
    if($request->ajax()){

       

        if($request->role_id==null){
 
            toastr()->error('Opps!Something went wrong');
            return redirect()->back();
        }
      

        //$role_id = Crypt::decrypt($request->role_id);
        $role_id = $request->role_id;

   
        $userName = DB::table('login_credentials')->where('user_name', $request->username)->where('role_id',$role_id)->get();


       

        if($request->hiddenID){
            $hiddenID = Crypt::decrypt($request->hiddenID);
           
            $check = DB::table('login_credentials')->where('user_name', $request->username)
                    ->where('role_id',$role_id)
                    ->whereNotIn('user_id',[$hiddenID])
                    ->get();
            if (count($check) > 0) {
                echo 'false';
            }else{
                echo 'true';

            }

        }else{
            if (count($userName) > 0) {
                echo 'false';
            }else{
               echo 'true';

            }
        }

       

     }else{
         toastr()->error('Opps!Something went wrong');
        return redirect()->back();
     }
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend\DSR\add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Request::isMethod('post')){
            $unique_id = "R".mt_rand(1000, 9999);
            if(!$request->chkskipped=='on'){

                $this->validate($request, [
                    'bank_name'=>'required',
                    'bank_AC'=>'required|numeric',
                    'AC_holder'=>'required',
                    'branch_name'=>'required',
                ]);
            };


            $this->validate($request, [
                'firstName' =>  'required|max:55',
                'lastName' =>  'required|max:55',
                'gender'=> 'required|in:male,female,other',
                'religion' =>'required|in:hinduism,islam,buddhists,christianity',
                'role_id' =>  'required',
                'joining_date' =>'required|date_format:d/m/Y',
                'designation' =>  'required',
                'qualification' =>  'required',
                'experience_details' =>  'nullable',
                'total_experience' =>  'nullable',
                'blood_group'=>'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
                'dob' => 'required|date_format:d/m/Y',
                'phone' =>  ['required','numeric','min:11','regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
                'email'=> 'required|email|unique:dsr_lists,email',
                'address1' =>'required|max:255',
                'address2' =>'required|max:255',
                'city' => 'required|in:bangladesh',
                'nid_number'=>'required|numeric',
                'image' =>'required|image',
                'father_name'=>'required',
                'mother_name'=>'required',
                'gurdian_mobile' =>  ['required','numeric','min:11','regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
                'gurdian_nid_number' =>  'required|numeric',
                'relationship' =>  'required|max:55',
                'gurdian_image' =>'required|image',
                'gurdian_documents' =>'required',
                'username' =>  'required|min:5',
                'status'=>'required|in:active,inactive',
                'password' => 'min:6',
                'cpassword' => 'required_with:password|same:password|min:6',
                'socialicon.*'=>  'nullable|required_with:socialUrl.*|in:facebook,twitter,linkedIn,instagram,youtube|distinct',
                'socialUrl.*'=> 'nullable|required_with:socialicon.*|url|distinct',
                'about'=>'nullable',
                'cv'=>'required',
    
            ]);

            

                //DSR User Name check
                $userName = DB::table('login_credentials')->where('user_name', $request->username)->where('role_id',$request->role_id)->get();
                if (count($userName) > 0) {
                    return redirect()->back()
                        ->with('msg','The DSR username is already in use!');
                    
                }
                //Employee User Name check End

                //DSR Image
                if($request->file('image')){
                    $image =$request->file('image');
                    $img_name = rand();
                    $text =strtolower($image->getClientOriginalExtension());
                    $img_full_name = $img_name.'.'.$text;
                    $upld_path ='Backend/DSR/DSR_image/';
                    $img_url =$upld_path. $img_full_name;
                    $success =$image->move($upld_path,$img_full_name);
                }else{
                    if($request->gender=="male"){
                        $img_url='avater/male.png';
                    }else if($request->gender=="female"){
                        $img_url='avater/female.png';
                    }else{
                        $img_url='avater/third.png';
                    }
                    
                }

                //Gurdian Image
                if($request->file('parent_image')){
                    $gurdian_image =$request->file('parent_image');
                    $gurdian_img_name = rand();
                    $gurdian_text =strtolower($gurdian_image->getClientOriginalExtension());
                    $gurdian_img_full_name = $gurdian_img_name.'.'.$gurdian_text;
                    $gurdian_upld_path ='Backend/DSR/DSR_gurdian/';
                    $gurdian_img_url =$gurdian_upld_path. $gurdian_img_full_name;
                    $success =$gurdian_image->move($gurdian_upld_path,$gurdian_img_full_name);
                }else{
                   
                    $gurdian_img_url='avater/default.png';
                }

                //Gurdian Documents 
                if($request->file('gurdian_documents')){
                    $gurdian_documents =$request->file('gurdian_documents');
                    $gurdian_documents_name = rand();
                    $gurdian_documents_text =strtolower($gurdian_documents->getClientOriginalExtension());
                    $gurdian_documents_full_name = $gurdian_documents_name.'.'.$gurdian_documents_text;
                    $gurdian_documents_upld_path ='Backend/DSR/DSR_gurdian_documents/';
                    $gurdian_documents_url =$gurdian_documents_upld_path. $gurdian_documents_full_name;
                    $success =$gurdian_documents->move($gurdian_documents_upld_path,$gurdian_documents_full_name);
                }else{
                   
                    $gurdian_documents_url='NULL';
                }

                  //cv
                if($request->file('cv')){
                    $cv =$request->file('cv');
                    $cv_name = rand();
                    $cv_text =strtolower($cv->getClientOriginalExtension());
                    $cv_full_name = $cv_name.'.'.$cv_text;
                    $cv_upld_path ='Backend/DSR/cv/';
                    $cv_url =$cv_upld_path. $cv_full_name;
                    $success =$cv->move($cv_upld_path,$cv_full_name);
                }else{
                    $cv_url=NULL;
                }

                //DSR Insert Data
               $DSR_id = DB::table('dsr_lists')->insertGetId([
                'unique_code' => $unique_id.Carbon::now()->second,
                'first_name'=> $request->firstName,
                'last_name'=> $request->lastName,
                'email'=> $request->email,
                'mobile'=> $request->phone,
                'nid_number'=> $request->nid_number,
                'dob'=>   \Carbon\Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d'),
                'present_address'=> $request->present_address,
                'permanent_address'=> $request->permanent_address,
                'gender'=> $request->gender,
                'joining_date'=> \Carbon\Carbon::createFromFormat('d/m/Y', $request->admission_date)->format('Y-m-d'),
                'religion'=> $request->religion,
                'blood_group'=> $request->blood_group,
                'country'=> $request->city,
                'qualification'=> $request->qualification,
                'experience_details'=> $request->experience_details,
                'total_experience'=> $request->total_experience,
                'image'=>$img_url,
                'bank_name'=> $request->bank_name,
                'bank_AC'=> $request->bank_AC,
                'AC_holder'=> $request->AC_holder,
                'about'=> $request->about,
                'documents'=>$cv_url,
                'Pass_code'=> $request->password,
                'father_name'=> $request->father_name,
                'mother_name'=> $request->mother_name,
                'gurdian_mobile'=> $request->phone,
                'gurdian_nid_number'=> $request->gurdian_nid_number,
                'relationship'=> $request->relationship,
                'gurdian_documents'=> $request->relationship,
                'status'=> $request->status,
                'created_at' => Carbon::now(),

            ]);

            //login_credentials DSR data insert
            $dsr_data=array();
            $dsr_data['user_id']=$DSR_id;
            $dsr_data['user_name']=$request->username;
            $dsr_data['password']=\Hash::make($request->password);
            $dsr_data['role_id']=$role_id;
            $dsr_data['status']='inactive';
            $dsr_data['created_at'] = Carbon::now();
            $done=DB::table('login_credentials')->insert($dsr_data);


            
            //Social data insert

            if(!in_array(null,$request->socialicon)){

                foreach($request->socialicon as $item=>$v){
                    $data1=array();
                    $data1['dsr_id']=$emp_id;
                    $data1['socialicon']=$request->socialicon[$item];
                    $data1['socialUrl']=$request->socialUrl[$item];
                    $data1['created_at'] = Carbon::now();
                    $done=DB::table('dsr_socials')->insert($data1);

                }

            }

            toastr()->success('Data Created Successfully.');
            return redirect()->back();


                //code...
            } catch (\Throwable $th) {
                toastr()->error('Opps!Something went wrong');
                return redirect()->back();
            }





        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
