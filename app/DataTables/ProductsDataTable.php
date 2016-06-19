<?php

namespace App\DataTables;

use App\Products\Product;
use Yajra\Datatables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->of($this->query())
            ->addColumn('categories', function ($product) {
                return view('backend.products.partials._datatable_categories', compact('product'));
            })->editColumn('created_at', function ($product) {
                return $product->created_at->format('Y/m/d');
            })->editColumn('featured', function ($product) {
                return view('backend.products.partials._datatable_featured', compact('product'));
            })->addColumn('action', function ($product) {
                return view('backend.products.partials._datatable_actions', compact('product'));
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $products = Product::withDrafts()->with(['categories'])->select('products.*')->latest('id');

        return $this->applyScopes($products);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        $html = $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->addAction()
            ->parameters([
                'dom'     => "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                'buttons' => ['csv', 'excel', 'pdf', 'print']
            ]);

        return $html;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'id',
            'name',
            'categories' => [
                'searchable' => false,
                'orderable'  => false
            ],
            'featured'   => [
                'searchable' => false
            ],
            'hits',
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users';
    }
}
