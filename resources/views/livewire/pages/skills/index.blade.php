<div>
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Skills</h1>
        </div>

        <div class="flex gap-6">
            <div class="w-3/4 bg-white p-6 shadow-md rounded-xl">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($skills as $skill)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $skill->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <button class="text-blue-600 hover:text-blue-800 font-medium mr-4" wire:click.prevent="editSkill({{ $skill->id }})">Edit</button>
                                    <button class="text-red-600 hover:text-red-800 font-medium" wire:click.prevent="deleteSkill({{ $skill->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="w-1/4 bg-white p-6 shadow-md rounded-xl">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Add new skill</h2>
                <form wire:submit.prevent="addSkill">
                    <div class="mb-4">
                        <label for="skillName" class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                        <input type="text" id="skillName" wire:model="skillName" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Skill name">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg shadow hover:bg-blue-600 transition duration-200" style="background-color: blue; color: white;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
