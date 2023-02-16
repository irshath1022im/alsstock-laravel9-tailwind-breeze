<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <title>REPORT</title>
    <style>
       @media print {
  .pagebreak {
     page-break-before: always;
  }
}
        </style>
</head>
<body
onload=window:print();
>


    <div class="h-[100%]  ">

        @foreach ($items as $item)

                <div class="m-1 h-[48vh] ">

                    {{-- NAME PART --}}

                    <div class="m-1 p-2  bg-gray-300 uppercase underline text-2xl relative
                            @if ($loop->odd)
                                text-right
                            @endif"
                        >

                        <div class="mx-36">
                            {{ $item->item }}
                        </div>

                        <div class="absolute top-0
                            @if ($loop->odd)
                               right-0
                            @endif
                            "
                            >
                            <img src="{{ asset('images/logo.png') }}"  class="rounded-full"/>
                        </div>

                    </div>

                    {{-- CONTENT PART --}}

                    <div class="flex justify-between  m-1">

                        {{-- LOGO --}}

                            <div class="basis-1/3
                                    @if ($loop->odd)
                                        order-2
                                    @endif
                                "
                            >
                                <div class=" p-2 border rounded-full w-64 h-64 flex mt-20" >

                                    <img src=" {{ $item->thumbnail ? Storage::url($item->thumbnail) : "/images/logo.png" }}" alt="" class="w-full h-full rounded-full">



                                </div>



                            </div>

                        {{-- ITEM SIZE LIST AND QTY --}}

                        <div class="basis-2/3 p-3 m-2 flex flex-col justify-center">


                            @if ($item->itemSize->isEmpty())

                                <div class="border">
                                    <div class="bg-slate-200 h2 border p-4 font-bold">No More Item Sizes !!!</div>
                                </div>

                                @else

                                    @foreach ($item->itemSize as $item_size)


                                            <div class="flex justify-between p-3 m-1  ">

                                                        <div class="flex justify-between w-1/2 border-b items-center text-xs ">

                                                            <div class="">
                                                                <h4>{{ $item_size->size->size }}</h4>
                                                            </div>

                                                            <div class="rounded-full px-2 py-1 border">
                                                                <span>{{ $item_size->transectionLogs->sum('qty') -  $item_size->storeRequestItems->sum('qty') }}</span>
                                                            </div>

                                                        </div>

                                            </div>


                                    @endforeach


                                @endif

                        </div>


                    </div>

                </div>

            @if ($loop->even)
            <div class="pagebreak border"></div>
            @endif

  @endforeach
</div>

    <script>

        </script>

</body>
</html>
