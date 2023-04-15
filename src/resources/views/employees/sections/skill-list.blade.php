<h4 class="mb-4 mt-0 text-2xl font-medium leading-tight text-secondary sasoft-secondary-text">
    Skills
</h4>
<div class="w-full">
    @forelse($skills as $skill)
        <div class="flex mb-2">
            <div class="w-full px-1 mb-2">
                <label class="block text-xs font-bold mb-2" for="{{ 'txtSkillName' . $loop->index }}">
                    Skill
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="{{ 'txtSkillName' . $loop->index }}" type="text" name="skills[{{ $loop->index }}][skill_name]" value="{{ $skill->skill_name }}">
            </div>
            <div class="w-1/4 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block text-xs font-bold mb-2" for="{{ 'txtYearsExperience' . $loop->index }}">
                    Yrs Exp
                </label>
                {{ Form::select("skills[$loop->index][years_experience]", $expOptions, $skill->years_experience, ['id' => 'txtYearsExperience' . $loop->index, 'class' => 'w-32 px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium']) }}
            </div>
            <div class="w-1/4 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block text-xs font-bold mb-2" for="{{ 'txtSkillRating' . $loop->index }}">
                    Seniority Rating
                </label>
                {{ Form::select("skills[$loop->index][skill_rating]", $skillRatingOptions, $skill->getSkillRating()->getSlug(), ['id' => 'txtSkillRating' . $loop->index, 'class' => 'w-32 px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium']) }}
            </div>
            <div class="flex w-1/4 px-1 justify-center items-center">
                <div class="text-center"><a href="#">&#128465;</a></div>
            </div>
        </div>
    @empty
        <div class="flex mb-2">
            <div class="w-full px-1 mb-2">
                <label class="block text-xs font-bold mb-2" for="txtSkillName0">
                    Skill
                </label>
                <input class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                       id="txtSkillName0" type="text" name="skills[0][skill_name]">
            </div>
            <div class="w-1/4 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block text-xs font-bold mb-2" for="txtYearsExperience0">
                    Yrs Exp
                </label>
                {{ Form::select("skills[0][years_experience]", $expOptions, null, ['id' => 'txtYearsExperience0', 'class' => 'w-32 px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium']) }}
            </div>
            <div class="w-1/4 px-1 mb-2 md:mb-1 sm:mb-1">
                <label class="block text-xs font-bold mb-2" for="txtSkillRating0">
                    Seniority Rating
                </label>
                {{ Form::select("skills[0][skill_rating]", $skillRatingOptions, null, ['id' => 'txtSkillRating0', 'class' => 'w-32 px-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium']) }}
            </div>
            <div class="flex w-1/4 px-1 justify-center items-center">
                <div class="text-center"><a href="#">&#128465;</a></div>
            </div>
        </div>
    @endforelse

    <button type="button" class="inline-flex items-center ml-1 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
        + Add New Skill
    </button>
</div>
