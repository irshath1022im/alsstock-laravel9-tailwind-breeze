
@extends('layouts.print')


@section('content')


<section class="h-screen w-full mx-0 p-1">


    <div class="flex justify-end">
        <img src="/images/logo.png" />
    </div>

    <div class="flex justify-center text-lg">
        <p class="h4"><strong>STORE REQUEST</strong></p>
    </div>



    <div class="w-full">
                  <table class="w-full border">
                      <thead class="">
                          <tr class="bg-blue-600 text-sm">
                              <th class="p-2 text-start">#</th>
                              <th class="p-2 text-start" >DESCRIPTION</th>
                              <th class="p-2 text-start">SIZE</th>
                              <th class="p-2 text-start">QUANTITY</th>
                              <th class="p-2 text-start">REMARK</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($store_request->storeRequestItems as $item)

                          <tr class="border-b text-xs">
                              <td class="p-2 text-start" ><strong>{{ $loop->iteration }}</strong></td>
                              <td class="p-2 text-start"  >{{ $item->itemSize->item->item}}</td>
                              <td class="p-2 text-start"  >{{ $item->itemSize->size->size}}</td>
                              <td class="p-2 text-start" >{{ $item->qty}}</td>
                              <td class="p-2 text-start"  >{{ $item->remark}}</td>
                          </tr>


                          @endforeach

                          @for ($i = count($store_request->storeRequestItems)+1; $i <= 10; $i++)
                                      @if ($i == count($store_request->storeRequestItems)+1)
                                          <tr class="border-b text-sm">
                                              <td class="p-2 text-start"><strong>{{ $i }}</strong></td>
                                              <td class="p-2 text-start">**********************</td>
                                              <td class="p-2 text-start">*********</td>
                                              <td class="p-2 text-start">*********</td>
                                              <td class="p-2 text-start">*********</td>
                                          </tr>

                                          @else

                                              <tr class="border-b text-sm">
                                                  <td class="p-2 text-start" ><strong>{{ $i }}</strong></td>
                                                  <td class="p-1 text-start" ></td>
                                                  <td class="p-2 text-start" ></td>
                                                  <td class="p-2 text-start" ></td>
                                                  <td class="p-2 text-start" ></td>
                                              </tr>

                              @endif
                          @endfor

                      </tbody>
                  </table>
        </div>


      <div class="mt-2 border">

          <div class="bg-slate-400 p-2 text-sm"><strong><p>REASON FOR REQUEST:</p></strong></div>
          <div class="p-4  h-18 text-xs">{{ $store_request->remark }}</h4></div>

      </div>


      <div class="mt-2 border">

          <div class="border-b bg-slate-400 p-2 text-sm"><strong><p>REQUESTER:</p></strong></div>
          <div class=" p-2 flex justify-between divide-x-4">

                  <div class="text-sm">
                      <strong class="mr-5">Name:</strong> {{ $store_request->requestedBy }}
                  </div>

                  <div class="text-sm">
                      <strong class="mx-5">Signature:</strong>
                  </div>

                  <div class="text-sm">
                      <strong class="mx-5">Date:</strong>{{$store_request->date}}
                  </div>

          </div>

      </div>

    <div class="border mt-2 text-sm">
         <div class="bg-slate-400 p-2"><strong>DIRECTOR:</strong></div>

         <div class="border-b p-3 flex justify-between text-sm">

                    <div class="basis-1/4 text-xs border-r p-2">
                        <label class="">
                        <input class="" type="checkbox" value="">
                        APPROVED
                        </label>
                    </div>

                    <div class="basis-1/4 text-xs border-r p-2">
                        <label class="">
                        <input class="" type="checkbox" value="">
                        REJECTED
                        </label>
                    </div>

                    <div class="basis-1/2 text-xs border-r p-2">

                        <label class="">SIGNATURE:</label>

                    </div>

                    <div class="basis-1/4 text-xs p-2">

                        <label class="">DATE</label>

                    </div>
          </div>


      </div>



        <div class="flex justify-center mt-10">
            <img src="/images/bottomLogo.png" class=""/>


        </div>


</section>
@endsection

