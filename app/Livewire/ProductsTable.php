<?php

namespace App\Livewire;

use App\Models\Manufacturer;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $perPage = 5;
    #[Url(history: true)]
    public $search = '';
    #[Url(history: true)]
    public $manufacturer = '';
    #[Url(history: true)]
    public $available = '';
    #[Url(history: true)]
    public $sortBy = 'name';
    #[Url(history: true)]
    public $sortDirection = 'DESC';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setSortBy($sortByField) {
        if ($this->sortBy === $sortByField) {
            $this->sortDirection = ($this->sortDirection == 'ASC' ? 'DESC' : 'ASC');

            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';
    }

    public function render()
    {
        $manufacturers = Manufacturer::pluck('name', 'id');
        $products = Product::search($this->search)
            ->when($this->manufacturer, fn ($q) => $q->where('manufacturer_id', $this->manufacturer))
            ->when($this->available !== '', fn ($q) => $q->where('available', $this->available))
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.products-table', [
            'products'      => $products,
            'manufacturers' => $manufacturers
        ]);
    }
}
