<h4 class="mb-4 mt-0 text-2xl font-medium leading-tight text-secondary sasoft-secondary-text">
    Skills
</h4>
<div class="w-full">
    @forelse($skills as $skill)
        <div class="flex mb-2">
            <div class="w-1/3 md:w-1/3 sm:w-1/3 px-1 mb-2">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtSkillName">
                    Skill
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillName" type="text" name="skills[{{ $loop->index }}]['skill_name']" value="{{ $skill->skill_name }}">
            </div>
            <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtYearsExperience">
                    Yrs Exp
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtYearsExperience" type="text" name="skills[{{ $loop->index }}]['years_experience']" value="{{ $skill->years_experience }}">
            </div>
            <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtSkillRating">
                    Seniority Rating
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillRating" type="text" name="skills[{{ $loop->index }}]['skill_rating']" value="{{ $skill->getSkillRating()->getName() }}">
            </div>
        </div>
    @empty
        <div class="flex mb-2">
            <div class="w-1/3 md:w-1/3 sm:w-1/3 px-1 mb-2">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtSkillName">
                    Skill
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillName" type="text" name="skills[0]['skill_name']">
            </div>
            <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtYearsExperience">
                    Yrs Exp
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtYearsExperience" type="text" name="skills[0]['years_experience']">
            </div>
            <div class="w-1/3 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block tracking-wide text-xs font-bold mb-2" for="txtSkillRating">
                    Seniority Rating
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillRating" type="text" name="skills[0]['skill_rating']">
            </div>
        </div>
    @endforelse

    <button type="button" class="inline-flex items-center ml-1 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
        + Add New Skill
    </button>
</div>
