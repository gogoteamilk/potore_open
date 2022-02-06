<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userSearchRequest;
use App\Services\AppServicesUtility;
use App\Models\User;

class userSearchController extends Controller
{
    public function search(userSearchRequest $request, User $User, AppServicesUtility $AppServicesUtility)
    {
        $searchQuery = $AppServicesUtility->keywordArrange($request->searchQuery);
        $userList = $User->userSearch($request, $searchQuery);
        return view('searchResult/userSearch', compact('userList'));
    }
}
