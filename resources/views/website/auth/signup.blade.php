@extends('components.guest_partials.default')
@section('content')

<div class="mx-auto w-full max-w-lg p-4 bg-white border border-gray-300 rounded-lg shadow-lg mt-6 mb-4">
    <h1 class="text-2xl text-center font-bold text-pink-600 mb-4">Join Us!</h1>
    @include('components.alerts')
    <form action="{{ route('register.submit') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Step 1: Basic Information -->
        <div class="step-container grid grid-cols-1 gap-6 active" id="step-1">
            <div class="form-group">
                <label for="first_name" class="font-semibold text-gray-700">First Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="last_name" class="font-semibold text-gray-700">Last Name <span
                        class="text-red-500">*</span></label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="gender" class="font-semibold text-gray-700">Gender</label>
                <select id="gender" name="gender"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                    <option value="" disabled selected>Select</option>
                    <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender')=='other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_birth" class="font-semibold text-gray-700">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            <button type="button"
                class="bg-pink-500 text-white p-2 rounded-lg hover:bg-pink-600 transition duration-300 w-full"
                onclick="nextStep()">Next</button>
        </div>

        <!-- Step 2: Profile Details -->
        <div class="step-container hidden grid grid-cols-1 gap-6" id="step-2">
            <div class="form-group">
                <label for="location" class="font-semibold text-gray-700">Address</label>
                <input type="text" id="location" name="address" value="{{ old('address') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    placeholder="Enter your city or zip code">
            </div>

            <div class="form-group">
                <label for="bio" class="font-semibold text-gray-700">Bio</label>
                <textarea id="bio" name="bio"
                    class="w-full  border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    placeholder="Tell us about yourself">{{ old('bio') }}</textarea>
            </div>


            <div class="form-group">
                <label for="profile_picture" class="font-semibold text-gray-700">Profile Picture</label>
                <div class="flex items-center justify-evenly">
                    <label
                        class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 p-4 rounded-lg h-32 w-1/2 cursor-pointer bg-white shadow-md hover:shadow-lg transition-shadow duration-200">
                        <input type="file" id="file" name="profile_picture" class="hidden" onchange="openCropper(event)"
                            accept=".svg,.png,.jpg,.gif">
                        <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5V6a2 2 0 012-2h9m4 4v12a2 2 0 01-2 2H7a2 2 0 01-2-2v-1m8-6l3-3m0 0l-3-3m3 3H9">
                            </path>
                        </svg>
                        <span class="text-gray-600 font-medium">Click to upload a file</span>
                        <span class="text-xs text-gray-400 mt-1">(SVG, PNG, JPG, or GIF)</span>
                    </label>

                    <img id="imagePreview" src="#" alt="Preview"
                        class="hidden w-24 h-24 rounded-full border border-gray-300 object-cover mb-2" />
                </div>
            </div>

            <!-- Crop Modal -->
            <div id="cropModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white rounded-lg p-6 w-96">
                    <h3 class="text-lg font-semibold mb-4">Crop your profile picture</h3>
                    <div>
                        <img id="cropImage" src="#" class="w-full h-auto">
                    </div>
                    <div class="flex justify-end mt-4 space-x-4">
                        <button type="button" onclick="closeCropModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                        <button type="button" onclick="cropImage()"
                            class="bg-pink-500 text-white px-4 py-2 rounded">Crop</button>
                    </div>
                </div>
            </div>



            <div class="flex justify-between my-3">
                <button type="button"
                    class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 transition duration-300"
                    onclick="prevStep()">Previous</button>
                <button type="button"
                    class="bg-pink-500 text-white p-2 rounded-lg hover:bg-pink-600 transition duration-300 w-[90px]"
                    onclick="nextStep()">Next</button>
            </div>
        </div>

        <!-- Step 3: Additional Information and Account Setup -->
        <div class="step-container hidden grid grid-cols-1 gap-6" id="step-3">
            <div class="form-group">
                <label for="email" class="font-semibold text-gray-700">Email <span class="text-red-500">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required>
            </div>
            <div class="form-group">
                <label for="phone" class="font-semibold text-gray-700">Mobile Number</label>
                <input type="tel" id="number" name="number" value="{{ old('number') }}" placeholder="Enter your number"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            <div class="form-group">
                <label for="password" class="font-semibold text-gray-700">Password <span
                        class="text-red-500">*</span></label>
                <input type="password" id="password" name="password" placeholder="Enter new password"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="font-semibold text-gray-700">Confirm Password <span
                        class="text-red-500">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Re-enter password"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required>
            </div>
            <div class="flex justify-between my-3">
                <button type="button"
                    class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 transition duration-300"
                    onclick="prevStep()">Previous</button>
                <button type="submit"
                    class="bg-pink-500 text-white p-2 rounded-lg hover:bg-pink-600 transition duration-300">Register</button>
            </div>
        </div>
    </form>

    <!-- Link to Login Page -->
    <div class="text-center mt-4">
        <p>Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline font-semibold">Login here</a>.
        </p>
    </div>
</div>

<!-- Social Login Buttons -->
<div class="m-4 text-center">
    <label class="font-semibold">Or sign up with</label>
    <div class="flex justify-center gap-4 mt-2">
        <button type="button"
            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Google</button>
        <button type="button"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">Facebook</button>
    </div>
</div>

<script>
    function nextStep() {
        const activeStep = document.querySelector('.step-container.active');
        const nextStep = activeStep.nextElementSibling;

        if (nextStep) {
            activeStep.classList.remove('active');
            activeStep.classList.add('hidden');
            nextStep.classList.remove('hidden');
            nextStep.classList.add('active');
        }
    }

    function prevStep() {
        const activeStep = document.querySelector('.step-container.active');
        const prevStep = activeStep.previousElementSibling;

        if (prevStep) {
            activeStep.classList.remove('active');
            activeStep.classList.add('hidden');
            prevStep.classList.remove('hidden');
            prevStep.classList.add('active');
        }
    }

    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>


<script>
    let cropper;

    // Open cropper modal when an image is selected
    function openCropper(event) {
        const file = event.target.files[0];
        console.log("Selected file:", file);
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                console.log("File loaded:", e.target.result);
                const cropImage = document.getElementById('cropImage');
                cropImage.src = e.target.result;

                // Show the modal
                document.getElementById('cropModal').classList.remove('hidden');

                // Initialize Cropper.js on the selected image
                cropper = new Cropper(cropImage, {
                    aspectRatio: 1, // Circle crop
                    viewMode: 1,
                    dragMode: 'move',
                    background: false,
                    responsive: true,
                    autoCropArea: 1,
                });
            };
            reader.readAsDataURL(file);
        } else {
            console.error("No file selected");
        }
    }

    // Crop the image and display it in the preview
    function cropImage() {
        if (cropper) {
            // Get the cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: 200,
                height: 200,
                fillColor: '#fff',
            });

            // Convert the canvas to a data URL and set it as the image preview source
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = canvas.toDataURL('image/png');
            imagePreview.classList.remove('hidden'); // Make sure preview is visible

            // Destroy cropper instance and hide the modal
            cropper.destroy();
            document.getElementById('cropModal').classList.add('hidden');
        }
    }

    // Close the crop modal without cropping
    function closeCropModal() {
        if (cropper) {
            cropper.destroy();
        }
        document.getElementById('cropModal').classList.add('hidden');
    }
    </script>


@endsection
