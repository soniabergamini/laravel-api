<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(3);
        $response = [
            "success" => true,
            "results" => $projects,
            "message" => "Cannot find data"
        ];
        return response()->json($response);
    }

    public function show($id) {
        $projects = Project::with('type', 'technologies')->find($id);
        $response = [
            "success" => true,
            "results" => $projects,
            "message" => "Cannot find data"
        ];
        return response()->json($response);
    }
}
