<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <!-- Username -->
    <div>
        <x-input-label for="username" :value="__('Username')" />
        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', $user->username)" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <!-- First Name -->
    <div class="mt-4">
        <x-input-label for="first_name" :value="__('First Name')" />
        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name', $user->first_name)" autocomplete="given-name" />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <!-- Last Name -->
    <div class="mt-4">
        <x-input-label for="last_name" :value="__('Last Name')" />
        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name', $user->last_name)" autocomplete="family-name" />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Contact Number -->
    <div class="mt-4">
        <x-input-label for="contact_number" :value="__('Contact Number')" />
        <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number', $user->contact_number)" autocomplete="tel" />
        <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
    </div>

    <!-- Other Address Fields -->
    <div class="mt-4">
        <x-input-label for="line_address_1" :value="__('Address Line 1')" />
        <x-text-input id="line_address_1" class="block mt-1 w-full" type="text" name="line_address_1" :value="old('line_address_1', $user->line_address_1)" />
        <x-input-error :messages="$errors->get('line_address_1')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="line_address_2" :value="__('Address Line 2')" />
        <x-text-input id="line_address_2" class="block mt-1 w-full" type="text" name="line_address_2" :value="old('line_address_2', $user->line_address_2)" />
        <x-input-error :messages="$errors->get('line_address_2')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="barangay" :value="__('Barangay')" />
        <x-text-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" :value="old('barangay', $user->barangay)" />
        <x-input-error :messages="$errors->get('barangay')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="municipality" :value="__('Municipality')" />
        <x-text-input id="municipality" class="block mt-1 w-full" type="text" name="municipality" :value="old('municipality', $user->municipality)" />
        <x-input-error :messages="$errors->get('municipality')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="city" :value="__('City')" />
        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $user->city)" />
        <x-input-error :messages="$errors->get('city')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="postal_code" :value="__('Postal Code')" />
        <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code', $user->postal_code)" />
        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>
