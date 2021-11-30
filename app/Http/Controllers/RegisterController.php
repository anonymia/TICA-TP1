<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'pob' => 'required',
            'date' => 'required|date|before:today',
            'gender' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,png',
            'certificate' => 'nullable|mimes:zip,rar',
            'cv' => 'nullable|mimes:pdf'
         ]);

         $picture = $request->file('picture');
         if ($picture->isValid()) {
            $pictureName = $picture->getClientOriginalName();
            $picture->move('public/', $pictureName);
            $pictureName = $pictureName.'<br><img src="public/'.$pictureName.'" height="200">';
         }

         $certificate = $request->file('certificate');
         if ($certificate->isValid()) {
            $certificateName = $certificate->getClientOriginalName();
            $certificate->move('public/', $certificateName);
            $certificateName = '<a href="public/'.$certificateName.'" target="_blank">'.$certificateName.'</a> ';
         }

         $cv = $request->file('cv');
         if ($cv->isValid()) {
            $cvName = $cv->getClientOriginalName();
            $cv->move('public/', $cvName);
            $cvName = '<a href="public/'.$cvName.'" target="_blank">'.$cvName.'</a> ';
         }

         return redirect('/')->with([
            'status' => 'success',
            'name' => $request->get('name'),
            'pob' => $request->get('pob'),
            'date' => $request->get('date'),
            'gender' => $request->get('gender') == '0' ? 'Laki-Laki' : 'Perempuan',
            'picture' => $pictureName,
            'certificate' => $certificateName,
            'cv' => $cvName
         ]);
    }
}
