<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 sasoft-modal-background">
    <h1 class="mb-2 mt-0 text-5xl font-medium leading-tight text-primary text-center">
        Create Employee
    </h1>
    <form class="w-full max-w-lg">

        @include('livewire.employees.modal.basic-info')
        @include('livewire.employees.modal.address-info')
        <h4 class="mb-4 mt-0 text-2xl font-medium leading-tight text-secondary sasoft-secondary-text">
            Skills
        </h4>

        <livewire:employees.modal.skill-list wire:model="skills" />

    </form>
</div>
