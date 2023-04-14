<div>
    <div class="flex items-center">
        <div class="mr-4">
            <span class="font-medium text-gray-600">Foo</span>
        </div>
        <div class="flex-grow">
            <input type="text" wire:model="search" class="w-full px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Search...">
        </div>
        <div class="flex-grow-0 ml-4">
            <select wire:model="filterOn" class="w-32 px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                <option value="">Filter By</option>
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
                <option value="contact_number">Contact Number</option>
            </select>
        </div>
    </div>

    <div class="mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">First Name</th>
                    <th class="px-4 py-2">Last Name</th>
                    <th class="px-4 py-2">Contact Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="border px-4 py-2">{{ $employee->first_name }}</td>
                        <td class="border px-4 py-2">{{ $employee->last_name }}</td>
                        <td class="border px-4 py-2">{{ $employee->contact_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>