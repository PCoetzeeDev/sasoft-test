<x-guest-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 sasoft-modal-background">
        <h1 class="mb-2 mt-0 text-5xl font-medium leading-tight text-primary text-center">
            Edit Employee
        </h1>

        <form action="{{ route('employees.update') }}" method="post" class="w-full">
            {{ csrf_field() }}

            <div class="grid grid-cols-2 gap-4">
                <div>
                    @include('employees.sections.basic-info')
                    @include('employees.sections.address-info', ['address' => $employee->getAddress()])
                </div>
                <div class="border-l-4 border-purple-400 p-2 pt-0">
                    @include('employees.sections.skill-list', ['skills' => $employee->getSkills()])
                </div>
            </div>

            <button type="submit" class="inline-flex items-center px-4 py-2 mt-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">Save</button>

        </form>
    </div>
</x-guest-layout>