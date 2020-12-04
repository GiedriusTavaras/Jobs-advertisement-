<header class="bg-gray-800 border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">
    <!-- Logo text or image -->
    <div class="border-dotted border-4 border-red-600 flex items-center justify-between mb-4 md:mb-0">
        <h1 class=" leading-none text-4xl text-white ">
            Job Listings
        </h1>


    </div>
    <!-- END Logo text or image -->

            <!-- Global navigation -->
            <nav>
                <ul class="list-reset md:flex md:items-center">
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('ad.index') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">All job listings</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('ad.create') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Create new job listing</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('language.index') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Languages</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('language.create') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Create new language</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- END Global navigation -->

        </header>

