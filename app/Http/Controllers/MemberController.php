<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InscriptionSanguinMail;
use Nexmo\Laravel\Facade\Nexmo;
use App\Member;


class MemberController extends Controller
{
    protected $rules = [
        'name'=>'required',
        'first_name'=>'required',
        'date_birth'=>'required',
        'groupeSanguin'=>'required',
        'common'=>'required',
        'email'=>'required',
        'sex'=>'required',
        'phone'=>'required',
    ];

    protected $message = [
        'required'=>'Le champ :attribute est requis'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::listingMembers();
        $title = ' | Bienvenue Sur la Plateforme Universelle de Don de Sang';
        $data = [
            'title'=>$title,
            'members'=>$members
        ];
        return view('member/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = ' | Inscription';
        $members = '';
        $data = [
            'title'=>$title,
            'members'=>$members
        ];
        return view('member/create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules, $this->message);
        $data = Member::getRequest($request);
        //dd($data);
        Member::create($data);
        Mail::to($request->email)->send(new InscriptionSanguinMail($data));
        $client = Nexmo::message()->send([
            'to'   => '225'.$request->phone,
            'from' => 'PSanguin',
            'text' => 'Merci pour votre inscription sur la plateforme universelle de don de sang',
        ]);
        $response = $client->getResponseData();
        //dd($response);
        if($response['messages'][0]['status'] == 0)
        {
            return redirect('/')->with('message','Merci Votre inscription a bien été effectuée un email de confirmation vous a été envoyé a votre adresse email Merci. Ainsi qu\'un SMS de confirmation');
        }else{
            return  redirect('/')->with('message','Votre inscription a bien été effectuée un email de confirmation vous a été envoyé a votre adresse email Merci.');
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
