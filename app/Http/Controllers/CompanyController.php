<?php

namespace App\Http\Controllers;

use App\Company;
use Image;
use Session;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);

        return view('admin.companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email',
            'website' => 'nullable|url',
            'image' => 'image|dimensions:min_width=100,min_height=100',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(microtime(true)) . "." . $image->getClientOriginalExtension();
            $location = storage_path('app/public/img/companies/' . $filename);
            Image::make($image)->resize(200, 200)->save($location);
            $company->logo = $filename;
        }
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email',
            'website' => 'nullable|url',
            'image' => 'image|dimensions:min_width=100,min_height=100',

        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        //adds a new picture to the storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(microtime(true)) . "." . $image->getClientOriginalExtension();
            $location = storage_path('app/public/img/companies/' . $filename);
            Image::make($image)->resize(200, 200)->save($location);

            //delets old picture from the storage if it exists.
            if ($company->logo != null) {
                $imgLocation = storage_path('app/public/img/companies/' . $company->logo);
                if (file_exists($imgLocation)) {
                    unlink($imgLocation);
                }
            }
            $company->logo = $filename;
        }
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->logo != null) {
            $imgLocation = storage_path('app/public/img/companies/' . $company->logo);
            if (file_exists($imgLocation)) {
                unlink($imgLocation);
            }
        }
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company was successfully deleted');
    }
}
