<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\InvoiceRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;;

#[OpenApi\PathItem]
class InvoiceController extends Controller
{
    private InvoiceRepository $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * Get all invoices
     */
    #[OpenApi\Operation(tags: ['Invoices'], method: 'GET')]
    public function index()
    {
        return $this->invoiceRepository->index();
    }

    /**
     * Get all paid invoices
     */
    #[OpenApi\Operation(tags: ['Invoices'], method: 'GET')]
    public function paidInvoiceStats()
    {
        return $this->invoiceRepository->paidInvoiceStats();
    }

    /**
     * Get all partner invoices
     */
    #[OpenApi\Operation(tags: ['Invoices'], method: 'GET')]
    public function partnerInvoices($id)
    {
        return $this->invoiceRepository->partnerInvoices($id);
    }

    public function store()
    {

    }

    public function show()
    {

    }

    /**
     * Update an existing invoice
     */
    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
