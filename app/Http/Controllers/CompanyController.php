<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\NewCompanyEntered;
use Image;
use Session;
use Mail;
use Illuminate\Http\Request;
use App\Filesystem\Storage\ImageStorage\ImageStorage;
use App\Http\Requests\StoreCompany;

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
    public function store(StoreCompany $request)
    {
        $request->validated();

        $imageStorage = new ImageStorage('companies');
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->hasFile('image')) {
            $filename = $imageStorage->saveImage($request->file('image'));
            $company->logo = $filename;
        }
        $company->save();

        Mail::to('admin@crm.com')->send(new NewCompanyEntered($company));

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
    public function update(StoreCompany $request, $id)
    {
        $request->validated();

        $imageStorage = new ImageStorage('companies');
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        //adds a new picture to the storage
        if ($request->hasFile('image')) {
            $filename = $imageStorage->saveImage($request->file('image'));

            //delets old picture from the storage if it exists.
            if ($company->logo != null) {
                $imageStorage->deleteImage($company->logo);
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
        $imageStorage = new ImageStorage('companies');
        $company = Company::findOrFail($id);
        if ($company->logo != null) {
            $imageStorage->deleteImage($company->logo);
        }
        $company->delete();

        return redirect()->back()->with('success', 'Company was successfully deleted');
    }
}
