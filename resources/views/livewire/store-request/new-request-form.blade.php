<div>

    {{-- @component('components.alert')

    @endcomponent --}}

    <x-success></x-success>



    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

<div>

    <div class="d-flex justify-content-end" >

        <button type="button" class="btn btn-primary position-relative">
            MODE :
            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                {{ $mode }}
            </span>
          </button>

        {{-- <button type="button" class="btn btn-primary">Mode : {{ $mode }}</button> --}}
    </div>

    <form>

        <div class="mb-3">
            <x-forms.label>Date</x-forms.label>
            <x-forms.input
                type="date"
                wire:model.defer="date"
            >
            </x-forms.input>

            <x-form_error field="date"></x-form_error>

        </div>

        <div class="mb-3">
            <x-forms.label>Requested By</x-forms.label>
            <select type="select"
                class="form-select form-controll"
                wire:model.defer="requestedBy">

              <option value="">Select</option>

              @foreach ($requesters as $requester)
                <option>{{ $requester->name }}</option>
              @endforeach

            </select>

            <x-form_error field="requestedBy"></x-form_error>

          </div>

          <div class="mb-3">
            <x-forms.label>Approved By</x-forms.label>
            <select class="form-select form-controll" wire:model.defer="approvedBy">
              <option value="">Select</option>
              <option>Dean Lavy</option>
              <option>Abdul</option>
            </select>

            <x-form_error field="approvedBy"></x-form_error>

          </div>

          <div class="mb-3">
            <x-forms.label>Status</x-forms.label>
            <select class="form-select form-controll"  wire:model.defer="status">
              <option value="">Select</option>
              <option>Requested</option>
              <option>Approved</option>
            </select>

             <x-form_error field="status"></x-form_error>
          </div>

          <div class="mb-3">
            <x-forms.label>Remark</x-forms.label>
            <textarea class="form-controll" wire:model.defer="remark" rows="3"></textarea>
          </div>

          <div class="flex justify-between">

            <div>


                @if ($mode == 'Edit')

                <x-button type="button" wire:loading.attr="disabled" class="bg-teal-500"
                    wire:click="updateForm"
                >UPDATE</x-button>

                @else


                <x-button type="button" wire:loading.attr="disabled" class="bg-teal-600"
                    wire:click="newRequest"
                >SUBMIT</x-button>

                @endif
            </div>

            <div>
                <x-button type="button" class="bg-gray-500"
                    wire:click="closeForm"
                >CANCELL</x-button>
            </div>

          </div>



    </form>
</div>






</div>
