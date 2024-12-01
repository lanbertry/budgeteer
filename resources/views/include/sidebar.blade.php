{{-- @vite(['resources/js/sidebar.js']) --}}
<aside class="bg-[#0F0B35] text-white w-1/4">

    <div class="pb-5 md:pb-5 p-5 px-10">
        <div class="flex">
            <img src="{{ asset('img/logo.png') }}" class="h-7 w-7">
            <h1 class="text-lg font-thin opacity-80">BUDGETeer.</h1>
        </div>

        <p class="text-sm">Track, Save, and Succeed!</p>

    </div>

    <hr class="">

    <div class="flex mt-10 items-center space-x-4 mb-10 ml-10">

        <div
            class="profilepic relative bg-red-100 h-24 w-24 rounded-full overflow-hidden flex items-center justify-center group">
            <!-- Profile Picture -->
            <img src="{{ $user->profile_picture_url }}" alt="Profile Picture" class="h-auto w-auto object-cover">



            <!-- Overlay with Camera Icon -->
            <div
                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <i class="fa-solid fa-camera text-white text-2xl pointer-events-none"></i>
            </div>

            <!-- Hidden File Input -->
            <label for="profilePictureInput" class="absolute inset-0 cursor-pointer z-10"></label>
            <input id="profilePictureInput" type="file" class="hidden" onchange="handleProfilePictureUpload(event)">
        </div>


        <div class="w-52">
            <p class="text-2xl font-semibold">
                {{ (Auth::user()->first_name ?? '') . ' ' . (Auth::user()->last_name ?? '') }}</p>
            <p class="text-lg font-thin">Student</p>
        </div>
    </div>

    <hr class="mb-10">
    <nav class="">
        <ul class="">
            <li class="py-3 hover:bg-[#2A2C5A] px-10 {{ request()->is('dashboard*') ? 'bg-[#2A2C5A]' : '' }}">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-white">
                    <i class="fa-solid fa-house text-2xl"></i>
                    <span class="text-xl font-semibold">Dashboard</span>
                </a>
            </li>
            <li class="py-3 hover:bg-[#2A2C5A] px-10 {{ request()->is('expenses*') ? 'bg-[#2A2C5A]' : '' }}">
                <a href="{{ route('expenses') }}" class="block flex items-center space-x-3 text-white">
                    <i class="fa-solid fa-money-bill-transfer text-2xl"></i>
                    <span class="text-xl font-semibold">Expenses</span>
                </a>
            </li>
            <li class="py-3 hover:bg-[#2A2C5A] px-10 {{ request()->is('summary*') ? 'bg-[#2A2C5A]' : '' }}">
                <a href="{{ route('summary') }}" class="flex items-center space-x-3">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                    <span class="text-xl font-semibold">Summary</span>
                </a>
            </li>
            <li class="py-3 hover:bg-[#2A2C5A] px-10 {{ request()->is('budget*') ? 'bg-[#2A2C5A]' : '' }}">
                <a href="{{ route('budget') }}" class="flex items-center space-x-3">
                    <i class="fa-solid fa-wallet text-2xl"></i>
                    <span class="text-xl font-semibold">Budget</span>
                </a>
            </li>
            <li class="py-3 hover:bg-[#2A2C5A] px-10">
                <a href="{{ route('logout') }}" class="flex items-center space-x-3">
                    <i class="fa-solid fa-right-from-bracket text-2xl"></i>
                    <span class="text-xl font-semibold">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<script>
    function handleProfilePictureUpload(event) {
        const file = event.target.files[0];

        if (file) {
            const formData = new FormData();
            formData.append('profile_picture', file);

            fetch('/upload-profile-picture', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        /* alert(data.message); */

                        // Update only the profile picture
                        const profilePic = document.querySelector('.profilepic img');
                        if (profilePic) {
                            profilePic.src = data.profile_picture_url;
                        }
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }
</script>
