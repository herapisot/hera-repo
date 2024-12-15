<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Payment;
use App\Notifications\EmailNotification;
use Carbon\Carbon;

class BoardingHouseController extends Controller
{
    /**
     * Display a listing of tenants.
     *
     * @return \Illuminate\Http\Response
     */
    public function tenantsList()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Track payments of a tenant.
     *
     * @param int $tenantId
     * @return \Illuminate\Http\Response
     */
    public function paymentTracking($tenantId)
    {
        $payments = Payment::where('tenant_id', $tenantId)->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Display tenant balance.
     *
     * @param int $tenantId
     * @return \Illuminate\Http\Response
     */
    public function balanceInquiry($tenantId)
    {
        $tenant = Tenant::findOrFail($tenantId);
        $balance = $tenant->payments->sum('amount') - $tenant->totalRentDue();
        return view('balance.inquiry', compact('tenant', 'balance'));
    }

    /**
     * Monitor annual income.
     *
     * @return \Illuminate\Http\Response
     */
    public function annualIncomeMonitoring()
    {
        $currentYear = Carbon::now()->year;
        $annualIncome = Payment::whereYear('created_at', $currentYear)->sum('amount');
        return view('income.monitoring', compact('annualIncome', 'currentYear'));
    }

    /**
     * Print receipt for a payment.
     *
     * @param int $paymentId
     * @return \Illuminate\Http\Response
     */
    public function printReceipt($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('receipts.print', compact('payment'));
    }

    /**
     * Monitor real-time slot availability.
     *
     * @return \Illuminate\Http\Response
     */
    public function realTimeSlotMonitoring()
    {
        $availableSlots = Tenant::where('is_active', false)->count();
        return view('slots.monitoring', compact('availableSlots'));
    }

    /**
     * Issue ticket for tenant-related issues.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function issueTicket(Request $request)
    {
        $validated = $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'description' => 'required|string|max:255',
        ]);

        $ticket = new Ticket();
        $ticket->tenant_id = $validated['tenant_id'];
        $ticket->description = $validated['description'];
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket issued successfully!');
    }

    /**
     * Send email notifications to tenants.
     *
     * @param int $tenantId
     * @return \Illuminate\Http\Response
     */
    public function sendEmailNotification($tenantId)
    {
        $tenant = Tenant::findOrFail($tenantId);

        $tenant->notify(new EmailNotification("Important update", "Please check your account for more details."));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
