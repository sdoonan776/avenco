<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::query()->select('*')->paginate(4);
        return view('admin.coupons.index', [
            'coupons' => $coupons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.show', [
            'coupon' => $coupon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', [
            'coupon' => $coupon
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CouponRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CouponRequest $request): RedirectResponse
    {
        Coupon::create($request->only([
            'code',
            'type',
            'percent_off'
        ]));

        return back()->withSuccess('Coupon created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CouponRequest $request
     * @param  Coupon $coupon
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $coupon->update([
            'code',
            'type',
            'percent_off'
        ]);
        return back()->withSuccess('Coupon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Coupon $coupon
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();
        return back()->withSuccess('Coupon deleted successfully');
    }
}
