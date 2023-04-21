<x-guest-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 sasoft-modal-background">

        @include('components.flash-result')

        <h1 class="mb-2 mt-0 text-5xl font-medium leading-tight text-primary text-center">
            Create Employee
        </h1>

        <form action="{{ route('employees.store') }}" method="post" class="w-full">
            {{ csrf_field() }}

            <div class="grid grid-cols-2 gap-4">
                <div>
                    @include('employees.sections.basic-info')
                    @include('employees.sections.address-info')
                </div>
                <div class="border-l-4 border-purple-400 p-2 pt-0">
                    @include('employees.sections.skill-list-livewire', ['employee' => $employee])
                </div>
            </div>

            <button type="submit" class="inline-flex px-4 py-2 sasoft-button">Save</button>
        </form>
    </div>
    <div class="flex w-full justify-center mt-10">
        <a href="{{ url()->route('index') }}">Click here to go back to the main page</a>
    </div>
</x-guest-layout>