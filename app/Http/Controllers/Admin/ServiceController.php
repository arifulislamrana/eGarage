<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        try
        {
            $closedServices = $this->serviceRepository->getPagiantedClosedServices($request->search);
            $availableServices = $this->serviceRepository->getPagiantedAvailableServices($request->search);

            return view('admin_dashboard.service_list', compact('closedServices', 'availableServices'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show service list", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show service list']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try
        {
            return view('admin_dashboard.create_service');
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show create_service form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show create_service form']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $imageName = "";
            $imagePath = "";

            if (!empty($request->image))
            {
                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.serviceImagePath'))."\\".$imageName;
                $request->file('image')->move(public_path(config('app.serviceImagePath')), $imageName);
            }

            $this->serviceRepository->create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'fee' => $request->fee,
                'status' => $request->status,
            ]);

            return redirect()->route('services.index')->with(['message' => 'Service data stored successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to Strore Service Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be saved. Please try again']);
        }
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
        try
        {
            $service = $this->serviceRepository->find($id);

            if (empty($service))
            {
                return redirect()->back()->withErrors(['invalid' => 'service does not exist']);
            }

            return view('admin_dashboard.update_service', compact('service'));
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to show service update form", "error", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to show update service form']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $service = $this->serviceRepository->find($id);
            $imageName = "";
            $imagePath = "";

            if ($request->image != null)
            {
                if(File::exists(public_path($service->image)))
                {
                    File::delete(public_path($service->image));
                }

                $imageName = time().rand(99, 100000000).'.'.$request->file('image')->extension();
                $imagePath = "\\".str_replace('/', "\\",config('app.serviceImagePath'))."\\".$imageName;
                $request->file('image')->move(public_path(config('app.serviceImagePath')), $imageName);
            }

            $this->serviceRepository->update($id, [
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'fee' => $request->fee,
                'status' => $request->status,
            ]);

            return redirect()->route('services.index')->with(['message' => 'service data updated successfully']);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update service Data", $e);

            return redirect()->back()->withErrors(['invalid' => 'data could not be updated. Please try again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $this->serviceRepository->destroy($id);

            return redirect()->route('services.index')->with(['message' => 'Service deleted']);
        }
        catch (Exception $e)
        {
            $this->logger->write("Failed to delete Service", "error", $e);

            return redirect()->back()->with(['message' => 'Service can not be deleted']);
        }
    }
}
