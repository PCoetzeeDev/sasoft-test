<div>
    <div class="flex items-center">
        <livewire:employees.components.count />
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
        <div class="flex-grow-1 ml-4">
            <button  wire:click="createEmployee" type="button" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                New Employee
            </button>
        </div>
    </div>

    <div class="mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">First Name</th>
                    <th class="px-4 py-2">Last Name</th>
                    <th class="px-4 py-2">Contact Number</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $key => $employee)
                    <tr class="sasoft-row">
                        <td class="border px-4 py-2">{{ $employee->first_name }}</td>
                        <td class="border px-4 py-2">{{ $employee->last_name }}</td>
                        <td class="border px-4 py-2">{{ $employee->contact_number }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('employees.edit', ['employeeCode' => $employee->code]) }}">EDIT</a>
                            <a href="{{ route('employees.delete', ['employeeCode' => $employee->code]) }}">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>
