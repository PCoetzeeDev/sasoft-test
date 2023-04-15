<h4 class="mb-4 mt-0 text-2xl font-medium leading-tight text-secondary sasoft-secondary-text">
    Basic Info
</h4>

<div class="flex flex-wrap mb-2">
    <div class="w-full md:w-1/2 sm:w-1/2 px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtFirstName">
            First Name
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtFirstName" type="text" name="basic[first_name]" value="{{ $employee->first_name ?? null }}">
        @include('components.show-input-error', ['id' => 'basic.first_name'])
    </div>
    <div class="w-full md:w-1/2 sm:w-1/2 px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtLastName">
            Last Name
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
               id="txtLastName" type="text" name="basic[last_name]" value="{{ $employee->last_name ?? null }}">
        @error('basic.last_name')
            <div class="block text-sm font-bold mb-2 text-red-600" style="margin-top: 0.75rem;">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="flex flex-wrap mb-2">
    <div class="w-full px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtContactNumber">
            Contact Number
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtContactNumber" type="text" name="basic[contact_number]" value="{{ $employee->contact_number ?? null }}">
        @include('components.show-input-error', ['id' => 'basic.contact_number'])
    </div>
</div>

<div class="flex flex-wrap mb-2">
    <div class="w-full px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtEmailAddress">
            Email Address
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtEmailAddress" type="text" name="basic[email_address]" value="{{ $employee->email_address ?? null }}">
        @include('components.show-input-error', ['id' => 'basic.email_address'])
    </div>
</div>

<div class="flex flex-wrap mb-2">
    <div class="w-full px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtEmailAddress">
            Date of Birth
        </label>
        {{ Form::date('basic[date_of_birth]', $employee->date_of_birth ?? now(), ['class' => 'appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500']) }}
        @include('components.show-input-error', ['id' => 'basic.date_of_birth'])
    </div>
</div>