<div>
    @foreach($skills as $skill)
        <div class="flex mb-2">
            <div class="w-1/3 md:w-1/3 sm:w-1/3 px-1 mb-2">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtSkillName">
                    Skill
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillName" type="text" name="skill_name" value="{{ $skill->skill_name }}">
            </div>
            <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtYearsExperience">
                    Yrs Exp
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtYearsExperience" type="text" name="years_experience" value="{{ $skill->years_experience }}">
            </div>
            <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtSkillRating">
                    Seniority Rating
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillRating" type="text" name="skill_rating_id" value="{{ $skill->getSkillRating()->getName() }}">
            </div>
        </div>
    @endforeach

    <button wire:click="$emit('createSkill', 'employees.modal.skill-list')" type="button" class="inline-flex w-full items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
        + Add New Skill
    </button>
</div>
