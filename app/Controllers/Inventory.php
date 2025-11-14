<?php

namespace App\Controllers;

use App\Models\BatteryModel;
use App\Models\InventoryModel;

class Inventory extends BaseController
{
    protected $batteryModel;
    protected $inventoryModel;

    public function __construct()
    {
        $this->batteryModel = new BatteryModel();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        $data['batteries'] = $this->batteryModel
            ->select('batteries.*, inventories.available_stock')
            ->join('inventories', 'inventories.battery_id = batteries.id', 'left')
            ->findAll();

        return view('inventory', $data);
    }

    public function update($battery_id)
    {
        $action = $this->request->getPost('action');
        $inventory = $this->inventoryModel->find($battery_id);

        if (!$inventory) {
            $this->inventoryModel->insert(['battery_id' => $battery_id, 'available_stock' => 0]);
            $inventory = $this->inventoryModel->find($battery_id);
        }

        switch ($action) {
            case 'add':
                $newStock = $inventory['available_stock'] + 1;
                $this->inventoryModel->update($battery_id, ['available_stock' => $newStock]);
                $message = 'Stock added successfully.';
                break;
            case 'reduce':
                if ($inventory['available_stock'] > 0) {
                    $newStock = $inventory['available_stock'] - 1;
                    $this->inventoryModel->update($battery_id, ['available_stock' => $newStock]);
                    $message = 'Stock reduced successfully.';
                } else {
                    return redirect()->to('/inventory')->with('error', 'Stock is already zero.');
                }
                break;
            default:
                return redirect()->to('/inventory')->with('error', 'Invalid action.');
        }
        return redirect()->to('/inventory')->with('message', $message);
    }
}
