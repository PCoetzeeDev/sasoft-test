<h4 class="mb-4 mt-0 text-2xl font-medium leading-tight text-secondary sasoft-secondary-text">
    Address Info
</h4>

<div class="flex flex-wrap mb-2">
    <div class="w-full px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtStreetAddress">
            Street Address
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtStreetAddress" type="text" name="address[street]" value="{{ $address->street ?? null }}">
    </div>
</div>

<div class="flex mb-2">
    <div class="w-1/3 md:w-1/3 sm:w-1/3 px-1 mb-2">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtCity">
            City
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtCity" type="text" name="address[city]" value="{{ $address->city ?? null }}">
    </div>
    <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtPostalCode">
            Postal Code
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtPostalCode" type="text" name="address[postal_code]" value="{{ $address->postal_code ?? null }}">
    </div>
    <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
        <label class="block tracking-wide text-xs font-bold mb-2" for="txtCountry">
            Country
        </label>
        <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
               id="txtCountry" type="text" name="address[country]" value="{{ $address->country ?? null }}">
    </div>
</div>