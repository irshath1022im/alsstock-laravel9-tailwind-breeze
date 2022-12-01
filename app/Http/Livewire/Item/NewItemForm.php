<?php

namespace App\Http\Livewire\Item;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewItemForm extends Component
{

    public $item;
    public $item_id;
    public $category_id;
    public $categories=[];
    public $mode;
    public $thumbnail;
    public $filePath;

    use WithFileUploads;


    protected $rules= [
        'item' => 'required',
        'category_id' => 'required',
        'thumbnail' => 'image|max:1024',
    ];

    public function AddNewItem()
    {


        // dd($fileExtention);

                 $validated = $this->validate();

                 $data = [
                    'item' => $this->item,
                    'category_id' => $this->category_id,
                    'thumbnail' => '',
                    // 'user_id' => Auth::user()->id
                    'user_id' => 1
                ];

                 $result = Item::create($data);



              $fileExtention = $this->thumbnail->getClientOriginalExtension();

             $this->filePath = Storage::disk('public')->putFileAs('itemCoverPhotos', $this->thumbnail, $result->id.'.'.$fileExtention);

                Item::where('id' , $result->id)
                        ->update(['thumbnail' => $this->filePath]);



             session()->flash('created', 'Item Has been added');
             $this->resetExcept('categories');
            //  redirect('items/'.$result->id.' ');




    }


    public function UpdateItem()
    {

          $this->validate([
                'item'=>'required',
                'category_id' => 'required',
            ]);


        if($this->thumbnail)
        {
            $fileExtention = $this->thumbnail->getClientOriginalExtension();

            $this->filePath = Storage::disk('public')->putFileAs('itemCoverPhotos', $this->thumbnail, $this->item_id.'.'.$fileExtention);
        }




            Item::where('id', $this->item_id)
            ->update([
                'item' => $this->item,
                'category_id' => $this->category_id,
                'thumbnail' => $this->filePath
            ]);

            //  route('items.show', ['item' => $id ];
            redirect('items/'.$this->item_id.' ');
            session()->flash('updated', 'Item Has been Updated');


    }

    public function mount($item_id)
    {
        $this->item_id = $item_id;
        $this->categories = Category::get();

        if($item_id) {
            $this->mode = 'edit';
            $result = Item::find($item_id);

            if($result) {

                $this->item_id = $result['id'];
                $this->item = $result['item'];
                $this->category_id = $result['category_id'];
                $this->filePath = $result['thumbnail'];
            } else {
                session()->flash('created', 'Item not found');
            }
        }


    }





    public function render()
    {
        return view('livewire.item.new-item-form');
    }
}
