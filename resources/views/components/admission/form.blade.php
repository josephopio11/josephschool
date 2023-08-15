<div class="p-6 bg-white border-b border-gray-200 lg:p-8">
    {{-- <x-application-logo class="block w-auto h-12" /> --}}

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Admit a Student
    </h1>

    <p class="mt-6 leading-relaxed text-gray-500">
        Please fill out the student information into this form
    </p>
</div>

<form action={{ route('admission.store') }} method="POST">
    @csrf
    <div class="grid grid-cols-1 gap-6 p-6 bg-gray-200 bg-opacity-25 lg:gap-8 lg:p-8">
        <div class="border-b border-gray-900/10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.
            </p>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 pb12">
            <div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    {{-- Admission Info --}}

                    <div class="sm:col-span-3">
                        <label for="admission_number"
                            class="block text-sm font-medium leading-6 text-gray-900">Admission Number</label>
                        <div class="mt-2">
                            <input type="text" name="admission_number" id="admission_number"
                                value="{{ $admission }}" readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="admission_date" class="block text-sm font-medium leading-6 text-gray-900">Admission
                            Date</label>
                        <div class="mt-2">
                            <input type="date" name="admission_date" id="admission_date" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="@php echo date('Y-m-d'); @endphp">
                        </div>
                    </div>

                    {{-- /Admission Info --}}


                    {{-- NAME --}}

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                            Name</label>
                        <div class="mt-2">
                            <input type="text" name="first_name" id="first_name" autocomplete="first_name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="middle_name" class="block text-sm font-medium leading-6 text-gray-900">Middle
                            Name</label>
                        <div class="mt-2">
                            <input type="text" name="middle_name" id="middle_name" autocomplete="middle_name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                            Name</label>
                        <div class="mt-2">
                            <input type="text" name="last_name" id="last_name" autocomplete="last_name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    {{-- /NAME --}}

                    {{-- Date of birth and gender --}}
                    <div class="sm:col-span-3">
                        <label for="date_of_birth" class="block text-sm font-medium leading-6 text-gray-900">Date of
                            Birth</label>
                        <div class="mt-2">
                            <input type="date" name="date_of_birth" id="date_of_birth" autocomplete="date_of_birth"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                        <div class="flex flex-row mt-2 align-middle">
                            <div class="mr-4 align-middle">
                                <input type="radio" name="gender" id="gender" value="male"
                                    class="border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <label for="name">Male</label>
                            </div>
                            <div class="align-middle">
                                <input type="radio" name="gender" id="gender" value="female"
                                    class="border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <label for="name">Female</label>
                            </div>
                        </div>
                    </div>

                    {{-- /Date of birth and gender --}}

                    {{-- Address Only --}}
                    <div class="sm:col-span-full">
                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                            <textarea id="address" name="address" type="date" autocomplete="address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                rows="4">
                        </textarea>
                        </div>
                    </div>
                    {{-- /Address Only --}}

                    {{-- City, State, Zip --}}
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                            <input type="text" name="city" id="city" autocomplete="address-level2"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State /
                            Province</label>
                        <div class="mt-2">
                            <input type="text" name="region" id="region" autocomplete="address-level1"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="country"
                            class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                        <div class="mt-2">
                            <select id="country" name="country" autocomplete="country-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>
                    {{-- City, State, Zip --}}

                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    {{-- Phone info --}}

                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone
                            Number</label>
                        <div class="mt-2">
                            <input type="text" name="phone" id="phone" autocomplete="phone"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="alternate_phone"
                            class="block text-sm font-medium leading-6 text-gray-900">Alternate Phone</label>
                        <div class="mt-2">
                            <input type="text" name="alternate_phone" id="alternate_phone"
                                autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    {{-- /Phone Info --}}

                    {{-- Email and password--}}

                    <div class="sm:col-span-full">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                        </div>
                    </div>
                    <div class="sm:col-span-full">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="password"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{ env('DEFAULT_STUDENT_PASSWORD') }}">

                        </div>
                    </div>
                    {{-- /Email and password--}}

                    {{-- Photo --}}
                    <div class="col-span-full">
                        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                        <div class="flex items-center mt-2 gap-x-3">
                            <svg class="text-gray-300 w-9 h-9" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <button type="button"
                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                        </div>
                    </div>
                    {{-- /Photo --}}

                    {{-- Previous School --}}
                    <div class="sm:col-span-full">
                        <label for="previous_school"
                            class="block text-sm font-medium leading-6 text-gray-900">Previous School</label>
                        <div class="mt-2">
                            <input id="previous_school" name="previous_school" type="text" autocomplete="previous_school"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    {{-- /Previous School --}}

                    {{-- Has sibling, can login password --}}

                    <div class="sm:col-span-3">
                        <label for="has_sibling" class="block text-sm font-medium leading-6 text-gray-900">Has sibling</label>
                        <div class="mt-2">
                            <input type="checkbox" name="has_sibling" id="has_sibling" autocomplete="has_sibling"
                                class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="can_login" class="block text-sm font-medium leading-6 text-gray-900">Can Login</label>
                        <div class="mt-2">
                            <input type="checkbox" name="can_login" id="can_login" autocomplete="can_login"
                                class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    {{-- /Has sibling, can login password --}}


                </div>
            </div>


        </div>

        <div class="flex items-center justify-center mt-6 gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </div>
</form>
