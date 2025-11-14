<?php

namespace App\Controllers;

use App\Models\BatteryModel;
use App\Models\InventoryModel;
use App\Models\ShipmentModel;

class Shipments extends BaseController
{
    public function index()
    {
        $batteryModel = new BatteryModel();

        $data['batteries'] = $batteryModel
            ->select('batteries.*, inventories.available_stock')
            ->join('inventories', 'inventories.battery_id = batteries.id', 'left')
            ->orderBy('batteries.name', 'ASC')
            ->findAll();

        return view('shipments', $data);
    }

    /**
     * 
     *
     * @param int $battery_id
     */
    public function send($battery_id)
    {
        $inventoryModel = new InventoryModel();
        $shipmentModel = new ShipmentModel();

        // Validate the request
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'quantity' => 'required|numeric|greater_than[0]',
            'destination' => 'required|string'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('error', $validation->listErrors());
        }

        $quantity = (int) $this->request->getPost('quantity');
        $destination = $this->request->getPost('destination');

        // Check available stock
        $inventory = $inventoryModel->find($battery_id);
        $availableStock = (int) ($inventory['available_stock'] ?? 0);

        if ($quantity > $availableStock) {
            return redirect()->back()->withInput()->with('error', 'Not enough stock available for shipment.');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        // Create shipment record
        $shipmentModel->save([
            'battery_id'  => $battery_id,
            'date_sent'   => date('Y-m-d'),
            'destination' => $destination,
            'total_sent'  => $quantity,
        ]);

        // Update inventory
        $inventoryModel->set('available_stock', 'available_stock - ' . $quantity, false)
            ->where('battery_id', $battery_id)
            ->update();

        $db->transComplete();

        return redirect()->to('/shipments')->with('message', 'Shipment successfully sent!');
    }
}