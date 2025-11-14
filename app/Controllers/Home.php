<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\ShipmentModel;

class Home extends BaseController
{
    public function index()
    {
        $inventoryModel = new InventoryModel();
        $shipmentModel = new ShipmentModel();

        $totalInventory = $inventoryModel->selectSum('available_stock', 'total')->first()['total'] ?? 0;

        $totalShipments = $shipmentModel->countAllResults();

        $totalCountries = $shipmentModel->distinct()->select('destination')->countAllResults();

        $data = [
            'totalInventory' => $totalInventory,
            'totalShipments' => $totalShipments,
            'totalCountries' => $totalCountries,
        ];

        return view('dashboard', $data);
    }
}