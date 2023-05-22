<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Library;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\Member\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    /**
     * Create a Member. Return the registration form.
     */
    public function create(Library $library): View
    {
        $member = new Member([
            'library_id' => $library->id,
            'user_id' => Auth::user()->id,
        ]);

        return view('member.create')->with(compact('library', 'member'));
    }

    /**
     * Remove a Member from database.
     */
    public function destroy(Member $member): RedirectResponse
    {
        Member::destroy($member->id);

        return back();
    }

    /**
     * Make a new Member.
     */
    public function store(Store $request): RedirectResponse
    {
        Member::create($request->only([
            'address_line_1',
            'address_line_2',
            'city',
            'library_id',
            'state',
            'user_id',
        ]));

        return redirect(route('members.user'));
    }

    /**
     * Index Members in the context of a User.
     */
    public function user(): View
    {
        $user = Auth::user()->load('members');

        return view('member.user')->with(['members' => $user->members]);
    }
}
