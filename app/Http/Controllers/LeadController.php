<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('name', 'LIKE', "%{$value}%")->orWhere('email', 'LIKE', "%{$value}%");
            });
        });
        $leads = QueryBuilder::for(Lead::class)
                    ->defaultSort('name')
                    ->allowedSorts(['name', 'email'])
                    ->allowedFilters(['status', 'types', 'name', 'email', $globalSearch])
                    ->paginate()
                    ->withQueryString();

        
        return Inertia::render('Leads/List', [
            'leads' => $leads,
        ])->table(function (InertiaTable $table) {
            $table->addSearchRows([
                'name' => 'Name',
                'email' => 'email',
            ])->addFilter('status', 'Status', [
                'Active' => 'Active',
                'Inactive' => 'Inactive'
            ])->addFilter('types', 'Types', [
                'PROVIDER' => 'PROVIDER',
                'RENTER' => 'RENTER',
                'BUYER' => 'BUYER'
            ])->addColumns([
                'email' => 'Email',
                'phone_number' => 'Phone Number',
                'city' => 'City',                
                'province' => 'Province', 
                'country' => 'Country',
                'postal_code' => 'postal_code',
                'types' => 'types',
                'is_gdpr' => 'is_gdpr',
                'contract_signing_date' => 'contract_signing_date',
                'contract_end_date' => 'contract_end_date',
                'is_leagal' => 'is_leagal',
                'export_type' => 'export_type',
                'status' => 'status',
                'created_at' => 'created_at'
            ]);
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
