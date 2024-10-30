@extends('components.guest_partials.default')
@section('content')



<div class="max-w-md mx-auto p-6 border border-gray-300 rounded-lg mt-8 mb-8">
    <h1 class="text-2xl text-center font-bold mb-6">Register</h1>
    @include('components.alerts')
    <form action="{{ route('register.submit') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Step 1: Basic Information -->
        <div class="step-container grid grid-cols-2 gap-4 active" id="step-1">
            <div class="form-group">
                <label for="first_name" class="flex items-center gap-1 font-semibold">First Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                    placeholder="Enter your first name" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="form-group">
                <label for="last_name" class="flex items-center gap-1 font-semibold">Last Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                    placeholder="Enter your last name" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="form-group">
                <label for="gender" class="font-semibold">Gender</label>
                <select id="gender" name="gender" value="{{ old('gender') }}"
                    class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_birth" class="font-semibold">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>
            <button type="button" class="bg-green-500 text-white p-2 rounded w-full" onclick="nextStep()">Next</button>
        </div>

        <!-- Step 2: Profile Details -->
        <div class="step-container hidden" id="step-2">
            <div class="form-group">
                <label for="location" class="font-semibold">Address</label>
                <input type="text" id="location" name="address" value="{{ old('address') }}"
                    placeholder="Enter your city or zip code" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="form-group">
                <label for="bio" class="font-semibold">Bio</label>
                <textarea id="bio" name="bio" value="{{ old('bio') }}"
                    class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>

            <div class="form-group">
                <label for="profile_picture" class="font-semibold">Profile Picture</label>
                <div class="flex items-center space-x-4">
                    <!-- Image Preview -->
                    <img id="imagePreview" src="#" alt="Preview"
                        class="hidden w-20 h-20 rounded-full border border-gray-300 object-cover" />

                    <!-- Custom File Input Wrapper -->
                    <div class="relative">
                        <!-- Hidden File Input -->
                        <input type="file" id="profile_picture" name="profile_picture"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*"
                            onchange="previewImage(event)" />

                        <!-- Custom Button -->
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none">
                            Choose File
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-between my-3 ">
                <button type="button" class="bg-gray-500 text-white p-2  rounded" onclick="prevStep()">Previous</button>
                <button type="button" class="bg-green-500 text-white p-2 w-[90px] rounded"
                    onclick="nextStep()">Next</button>
            </div>
        </div>

        <!-- Step 3: Additional Information and Account Setup -->
        <div class="step-container hidden" id="step-3">
            <div class="form-group">
                <label for="email" class="font-semibold">Email <span class="text-red-500">*</span> </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="form-group">
                <label for="password" class="font-semibold">Password <span class="text-red-500">*</span> </label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="font-semibold">Confirm Password <span class="text-red-500">*</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="flex justify-between my-3 ">
                <button type="button" class="bg-gray-500 text-white p-2 rounded" onclick="prevStep()">Previous</button>
                <button type="submit" class="bg-green-500 text-white p-2 rounded">Register</button>
            </div>
        </div>
    </form>

    <div class="mt-4 text-center">
        <label class="font-semibold">Social Login</label>
        <div class="flex justify-center gap-4 mt-2">
            <button type="button" class="bg-red-500 text-white p-2 rounded font-bold flex items-center gap-2">
                <i class="fab fa-google"></i> Google
            </button>
            <button type="button" class="bg-blue-700 text-white p-2 rounded font-bold flex items-center gap-2">
                <i class="fab fa-facebook-f"></i> Facebook
            </button>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;
    const totalSteps = 3;

    function showStep(step) {
        for (let i = 1; i <= totalSteps; i++) {
            document.getElementById(`step-${i}`).classList.toggle('hidden', i !== step);
        }
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }
</script>


<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('imagePreview');
            preview.src = reader.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
