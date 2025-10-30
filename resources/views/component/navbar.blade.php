<aside class="flex bg-blue-800 text-white flex-col w-40 h-screen top-0 left-0">
    <nav class="w-full">
        <ul class="flex flex-col justify-center items-start mt-3 w-full p-1">
            <a href="{{ url('/employee') }}" class="my-2 w-full">
                <li class="hover:bg-blue-700 py-2 w-full rounded-full"><span
                        class="ms-4 text-sm tracking-wider">Employee</span></li>
            </a>
            <a href="{{ url('/department') }}" class="my-2 w-full">
                <li class="hover:bg-blue-700 py-2 w-full rounded-full"><span
                        class="ms-4 text-sm tracking-wider">Department</span></li>
            </a>
            <a href="{{ url('/position') }}" class="my-2 w-full">
                <li class="hover:bg-blue-700 py-2 w-full rounded-full"><span
                        class="ms-4 text-sm tracking-wider">Position</span></li>
            </a>
            <a href="{{ url('/attendance') }}" class="my-2 w-full">
                <li class="hover:bg-blue-700 py-2 w-full rounded-full"><span
                        class="ms-4 text-sm tracking-wider">Attendance</span></li>
            </a>
            <a href="{{ url('/salary') }}" class="my-2 w-full">
                <li class="hover:bg-blue-700 py-2 w-full rounded-full"><span
                        class="ms-4 text-sm tracking-wider">Salary</span></li>
            </a>
        </ul>
    </nav>
</aside>