<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryCreateRequest;
use App\View\Components\EnquiryComponent;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(EnquiryCreateRequest $requset)
    {
        $validatedData = $requset->validated();
        return redirect()->back();
    }
}
