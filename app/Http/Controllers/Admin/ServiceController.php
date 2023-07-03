<?php

namespace App\Http\Controllers\Admin;

use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ServiceRepository\IServiceRepository;

class ServiceController extends Controller
{
    public $logger;
    public $serviceRepository;

    public function __construct(ILogger $logger, IServiceRepository $serviceRepository)
    {
        $this->logger = $logger;
        $this->serviceRepository = $serviceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $closedServices = $this->serviceRepository->getPagiantedClosedServices($request->search);
        $availableServices = $this->serviceRepository->getPagiantedAvailableServices($request->search);

        return view('admin_dashboard.service_list', compact('closedServices', 'availableServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
