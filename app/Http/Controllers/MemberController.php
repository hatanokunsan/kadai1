<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Member $member)
    {
        $title = '一覧画面';
        $members = $member->allMembersSelect();
        return view('member.index', compact('title', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member, $id, Request $request)
    {
        $title = '登録画面';
        $sub_title = '更新登録';
        $member = $member->editMemberSelect($id);
        return view('member.edit', compact('title', 'sub_title', 'member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id, Member $member)
    {
        $member = Member::find($id);
        $member->name = $request->name;
        $member->mail = $request->mail;
        $member->age = $request->age;
        $member->gender = $request->gender;
        $member->save();
        return redirect(route('member.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member, $id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect(route('member.index'))->with('message', '削除しました');
    }
}
