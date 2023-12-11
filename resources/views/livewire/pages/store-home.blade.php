<div class="text-white">


    <div class="Rectangle2  bg-white flex items-center p-3 mt-[20%] ">
        <div class="  text-black text-base font-bold font-['lato'] basis-1/4 " >#</div>
        <div class="Store  text-black text-base font-bold font-['lato']  basis-1/4 ">STORE</div>
        <div class="Categoryies  text-black text-base font-bold font-['lato'] basis-1/4  ">CATEGORYIES</div>
        <div class="Items  text-black text-base font-bold font-['lato']  basis-1/4 ">ITEMS</div>
    </div>

    @foreach ($stores as $item)


        <div class="Rectangle2  bg-white flex  items-center p-3  mt-1">
            <div class="  text-black text-base font-bold font-['lato'] basis-1/4  ">{{ $loop->iteration }}</div>
            <div class="Store  text-black text-base font-bold font-['lato'] basis-1/4 ">{{ $item->store }}</div>
            <div class="Categoryies  text-black text-base font-bold font-['lato'] basis-1/4 flex  ">
                <div>{{ $item->category->count() }}</div>
                <a href="{{ route('categories.index') }}"><div>

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M8.5 19H19.385C19.829 19 20.209 18.8417 20.525 18.525C20.8417 18.209 21 17.829 21 17.385V14.98H8.5V19ZM3 9.02H7.5V5H4.615C4.171 5 3.791 5.15833 3.475 5.475C3.15833 5.791 3 6.171 3 6.615V9.02ZM3 14H7.5V10.02H3V14ZM4.615 19H7.5V14.98H3V17.385C3 17.829 3.15833 18.209 3.475 18.525C3.791 18.8417 4.171 19 4.615 19ZM8.5 14H21V10.02H8.5V14ZM8.5 9.02H21V6.614C21 6.17 20.8417 5.79 20.525 5.474C20.209 5.158 19.829 5 19.385 5H8.5V9.02Z" fill="#B52F2F"/>
                         </svg>
                </div></a>
            </div>
            <div class="Items  text-black text-base font-bold font-['lato'] basis-1/4 flex">
                <div>{{ $item->items->count()}}</div>
                <a href="{{ route('items.index') }}">
                    <div> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 19H19.385C19.829 19 20.209 18.8417 20.525 18.525C20.8417 18.209 21 17.829 21 17.385V14.98H8.5V19ZM3 9.02H7.5V5H4.615C4.171 5 3.791 5.15833 3.475 5.475C3.15833 5.791 3 6.171 3 6.615V9.02ZM3 14H7.5V10.02H3V14ZM4.615 19H7.5V14.98H3V17.385C3 17.829 3.15833 18.209 3.475 18.525C3.791 18.8417 4.171 19 4.615 19ZM8.5 14H21V10.02H8.5V14ZM8.5 9.02H21V6.614C21 6.17 20.8417 5.79 20.525 5.474C20.209 5.158 19.829 5 19.385 5H8.5V9.02Z" fill="#B52F2F"/>
                    </svg></div></a>
            </div>
        </div>

        {{-- @dump($item->items) --}}

    @endforeach




</div>
