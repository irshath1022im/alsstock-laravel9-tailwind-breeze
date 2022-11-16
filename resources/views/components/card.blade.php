
<div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

    @foreach ($items as $item)



    <div class=" border-red-400 border-2 p-2 rounded-xl">

        <div class="mb-1">
            <h5 class="bg-orange-300 text-center text-lg text-stone-400 p-3">{{ $item->item }}E</h5>
        </div>

        <div>
            <a href="#">
                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
            </a>
        </div>

        <div class="mt-1 flex justify-between">
            <button class="rounded border-red-500 border-2 p-1">View More</button>
            <button  class="rounded border-blue-500 border-2 p-1">{{ $item->category->category }}</button>
        </div>


     </div>

     @endforeach


{{--
     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>

     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>

     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>
     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>
     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>
     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>
     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>
     <div class=" border-red-400 border-2 p-2 rounded-xl">
        <div>
         <a href="#">
             <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="">
         </a>
        </div>

        <div>
         <h5 class="bg-slate-300 text-center text-lg text-stone-400 p-3">ITEM NAME</h5>
        </div>

     </div>
 --}}


</div>

{{ $items->links() }}
</div>

