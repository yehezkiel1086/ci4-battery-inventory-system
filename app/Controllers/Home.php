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

        $totalShipments = $shipmentModel->selectSum('total_sent', 'total')->first()['total'] ?? 0;

        $totalCountries = $shipmentModel->distinct()->select('destination')->countAllResults();

        // Get shipment data for the chart
        $shipmentsByCountry = $shipmentModel
            ->select('destination, SUM(total_sent) as total_shipments')
            ->groupBy('destination')
            ->orderBy('total_shipments', 'DESC')
            ->findAll();

        $chartLabels = array_column($shipmentsByCountry, 'destination');
        $chartData = array_column($shipmentsByCountry, 'total_shipments');

        $data = [
            'totalInventory' => $totalInventory,
            'totalShipments' => $totalShipments,
            'totalCountries' => $totalCountries,
            'chartLabels'    => $chartLabels,
            'chartData'      => $chartData,
        ];

        return view('dashboard', $data);
    }
}