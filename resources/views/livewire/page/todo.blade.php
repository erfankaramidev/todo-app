<!-- Box -->
<div class="w-full max-w-2xl bg-white shadow-md rounded-2xl p-6">
    <!-- Header -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold text-gray-900">To-do list</h1>
        <select id="sort" class="border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-indigo-400">
            <option value="created">Date created</option>
            <option value="alphabetical">A-Z</option>
        </select>
    </header>

    <!-- New task input -->
    <div class="flex mb-4">
        <input class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 focus:border-indigo-400 outline-none"
            type="text" name="task" placeholder="Add a new task...">
        <button class="px-6 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-r-xl cursor-pointer">Add</button>
    </div>

    <!-- Filters -->
    <div class="flex justify-center space-x-2 mb-4">
        <button class="px-3 py-1 rounded-full cursor-pointer bg-indigo-100 text-indigo-700 font-medium">All</button>
        <button class="px-3 py-1 rounded-full cursor-pointer bg-gray-100 text-gray-700">Active</button>
        <button class="px-3 py-1 rounded-full cursor-pointer bg-gray-100 text-gray-700">Completed</button>
    </div>

    <!-- Task list -->
    <ul class="space-y-3 mb-4">
        <li class="flex justify-between items-center bg-gray-50 p-4 rounded-xl shadow-xs font-medium">
            <span class="text-gray-800">Task One</span>
            <button class="bg-green-100 hover:bg-green-200 text-green-700 rounded-lg py-1 px-3">Done</button>
        </li>
        <li class="flex justify-between items-center bg-gray-50 p-4 rounded-xl shadow-xs font-medium">
            <span class="text-gray-400 font-normal line-through">Task Two</span>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg py-1 px-3">Undo</button>
        </li>
    </ul>

    <!-- Pagination -->
    <div class="flex justify-center space-x-2">
        <button disabled
            class="px-3 py-1 rounded bg-gray-200 disabled:bg-gray-300 disabled:cursor-not-allowed hover:bg-gray-300 text-gray-700">Previous</button>
        <button class="px-3 py-1 rounded bg-gray-200 text-gray-700 cursor-pointer">Next</button>
    </div>
</div>