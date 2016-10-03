<?php

namespace Directory\Http\Controllers;

use Directory\Entities\Client;
use Directory\Entities\Sector;
use Directory\User;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Webpatser\Countries\Countries;

class DirectoryController extends Controller
{
    public function index()
    {
        $users = Client::with(['user', 'sectors', 'countryName'])
            ->where('validate',1)
        ->paginate(20);
        $countries = Countries::all();
        $sectors = Sector::lists('name', 'id');
        return view('front.directory', compact('users', 'countries', 'sectors'));
    }

    public function filterUser(Request $request)
    {
        $name = $request->input('name');
        $country = $request->input('country');
        $sector = $request->input('sector');
        $countries = Countries::all();
        $sectors = Sector::lists('name', 'id');
        $users = Client::with(['user', 'sectors', 'countryName'])
            ->where('validate',1)
            ->whereHas('user', function ($q) use ($name) {
                $q->whereRaw("name like '%$name%'");
            });
        if (!empty($country)) {
            $users = $users->whereHas('countryName', function ($q) use ($country) {
                $q->where('country', $country);
            });
        }
        if ($sector) {

            $users = $users->whereHas('sectors', function ($q) use ($sector) {
                $q->whereIn('sector_id', $sector);
            });
        }
        $users = $users->paginate(50);
        return view('front.directory', compact('users', 'countries', 'sectors'));

    }

    public function user($id)
    {
        $user = Client::find($id);
        return view('front.directoryUser', compact('user'));
    }

}
