<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 bg-white border-b border-gray-200 lg:p-8">
                    {{-- <x-application-logo class="block w-auto h-12" /> --}}

                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Admitted Students to be Confirmed
                    </h1>
                    <a href="{{ route('admission.create') }}" class="p-2 font-bold text-white bg-purple-500 rounded-md shadow shadow-slate-800 hover:bg-purple-800 hover:shadow-sm">Admit a Student</a>
                </div>



                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Admission Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Photo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $student->admission_number }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $student->first_name . ' ' . $student->middle_name . ' ' .  $student->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $student->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#">
                                            <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/50?u={{ $student->id }}" alt="Jese Leos">
                                        </a>
                                    </td>
                                    <td>
                                        admit | edit | delete
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
