<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;

class AdminController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $projects = Project::all();
        return view('admin.dashboard', compact('services', 'projects'));
    }

    public function addService(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Service::create($request->only(['title','description']));

        return redirect()->back()->with('success', 'تم إضافة الخدمة بنجاح!');
    }

    public function addProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Project::create($request->only(['title','description']));

        return redirect()->back()->with('success', 'تم إضافة المشروع بنجاح!');
    }

    public function deleteService($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف الخدمة.');
    }

    public function deleteProject($id)
    {
        Project::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف المشروع.');
    }
}
