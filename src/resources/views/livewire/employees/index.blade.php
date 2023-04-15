<div>
    @if (flash()->message)
        <div class="{{ flash()->class }}" role="alert">
             <span class="font-medium">{{ flash()->message }}</span>
        </div>
    @endif
    <div class="flex items-center">
        <livewire:employees.components.count />
        <div class="flex-grow">
            <input type="text" wire:model="search" class="w-full px-4 py-2 rounded-lg shadow focus:border-purple-500 focus:shadow-outline text-white font-bold" placeholder="Search..." style="background-color: #130413; border: solid white;">
        </div>
        <div class="flex-grow-0 ml-4">
            <select wire:model="filterOn" class="w-32 px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-white font-medium" style="background-color: #130413; border: none;">
                <option value="">Filter By</option>
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
                <option value="contact_number">Contact Number</option>
            </select>
        </div>
        <div class="flex-grow-1 ml-4">
            <button  wire:click="createEmployee" type="button" class="inline-flex px-4 py-2 sasoft-button">
                + New Employee
            </button>
        </div>
    </div>

    <div class="mt-4">
        <table class="table-auto border-collapse w-full">
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
                    <tr class="sasoft-row px-6">
                        <td class="rounded-l-full px-4 py-2">{{ $employee->first_name }}</td>
                        <td class="px-4 py-2">{{ $employee->last_name }}</td>
                        <td class="px-4 py-2">{{ $employee->contact_number }}</td>
                        <td class="rounded-r-full px-4 py-2">
                            <a href="{{ route('employees.edit', ['employeeCode' => $employee->code]) }}">EDIT</a>
                            <a href="{{ route('employees.delete', ['employeeCode' => $employee->code]) }}"></a>
                        </td>
                    </tr>
                    <tr class="px-20">
                        <td colspan="4">&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>
