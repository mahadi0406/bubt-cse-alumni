<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request): array
    {
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $company = Company::query()->create($data);

        return [
            'name' => $company->name,
            'id' => $company->id,
        ];
    }
}
