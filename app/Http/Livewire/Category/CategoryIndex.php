<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{

    public $modalOpen = false;


    protected $listeners =['modalCloseRequest'];


    public function modalCloseRequest()
    {
        $this->modalOpen = false;
    }


    public function editCategoryRequest($category)
    {
        $this->modalOpen = true;
        $this->emit('sendEditRequest', $category);
    }


    public function render()
    {
        $result = Category::with('store','items')->get();
        return view('livewire.category.category-index',['categories' => $result]);
    }
}
