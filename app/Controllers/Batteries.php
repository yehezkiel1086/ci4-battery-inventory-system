<?php

namespace App\Controllers;

use App\Models\BatteryModel;
use App\Models\CategoryModel;

class Batteries extends BaseController
{
    protected $batteryModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->batteryModel = new BatteryModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'batteries' => $this->batteryModel->findAll()
        ];
        return view("batteries", $data);
    }

    public function new()
    {
        $data = [
            'categories' => $this->categoryModel->findAll()
        ];
        return view("createBattery", $data);
    }

    public function show($id)
    {
        $data = [
            'battery' => $this->batteryModel->find($id)
        ];

        if (empty($data['battery'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the battery item: ' . $id);
        }

        return view('showBattery', $data);
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'type'        => $this->request->getPost('type'),
            'capacity'   => $this->request->getPost('capacity'),
            'voltage'     => $this->request->getPost('voltage'),
            'price'       => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        $this->batteryModel->insert($data);

        return redirect()->to('/batteries')->with('message', 'Battery created successfully.');
    }

    public function edit($id)
    {
        $data = [
            'battery'    => $this->batteryModel->find($id),
            'categories' => $this->categoryModel->findAll()
        ];

        if (empty($data['battery'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the battery item: ' . $id);
        }

        return view('editBattery', $data);
    }

    public function update($id)
    {
        $data = [
            'name'        => $this->request->getPost('name'),
            'type'        => $this->request->getPost('type'),
            'capacity'    => $this->request->getPost('capacity'),
            'voltage'     => $this->request->getPost('voltage'),
            'price'       => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        $this->batteryModel->update($id, $data);

        return redirect()->to('/batteries/show/' . $id)->with('message', 'Battery updated successfully.');
    }

    public function delete($id)
    {
        $this->batteryModel->delete($id);
        return redirect()->to('/batteries')->with('message', 'Battery deleted successfully.');
    }
}
