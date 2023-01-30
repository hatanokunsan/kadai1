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
    public function create(Member $member)
    {
        $title = '登録画面';
        $sub_title = '新規登録';
        return view('member.createOrUpdate', compact('title', 'sub_title', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request, Member $member)
    {
        $member = $member->fill($request->all());
        $member->save();
        return redirect('/')->with('message', '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // 詳細ページは用意しない為、一覧ページにリダイレクトさせる
        redirect('/');
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
        // 指定された$idに該当するデータが存在しない場合の処理
        if ($member == null) {
            return redirect('/')->with('message', '存在しません');
        }
        return view('member.createOrUpdate', compact('title', 'sub_title', 'member'));
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
        $member->updateMember($id, $request);
        return redirect('/')->with(['message' => '更新しました']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member, $id)
    {
        $member = $member->find($id);
        // 指定された$idに該当するデータが存在しない場合の処理
        if ($member == null) {
            return redirect('/')->with('message', '存在しません');
        }
        $member->delete();
        return redirect('/')->with('message', '削除しました');
    }
}
