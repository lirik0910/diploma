<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\ProjectStatus;
use Illuminate\Http\Request;
use App\Project;
use App\Vacancy;

class PageController extends Controller
{
    private $projectModel;
    private $vacancyModel;

    public function __construct(Project $projectModel, Vacancy $vacancyModel)
    {
        $this->projectModel = $projectModel;
        $this->vacancyModel = $vacancyModel;
    }

    public function updateVacancy($id)
    {
        $item = $this->vacancyModel->find($id);
        $defaultCriterias = Criteria::all();
        //var_dump($item->criterias); die;

        return view('content.update_vacancy', [
            'item' => $item,
            'defaultCriterias' => $defaultCriterias
        ]);
    }

    public function choose(Request $request)
    {

    }

    public function one()
    {

    }

    public function projects(Request $request)
    {
        $items = $this->projectModel->many();

        return view('content.projects', [
            'items' => $items
        ]);
    }


    public function addProject(Request $request)
    {
        $statuses = ProjectStatus::all();

        return view('content.add_project', [
            'statuses' => $statuses
        ]);
    }

    public function updateProject($id, Request $request)
    {
        $statuses = ProjectStatus::all();
        $defaultCriterias = Criteria::all();

        $project = $this->projectModel->one($id);

        return view('content.update_project', [
            'statuses' => $statuses,
            'item' => $project,
            'defaultCriterias' => $defaultCriterias
        ]);
    }
}
