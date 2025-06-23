<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- In resources/views/profile/edit.blade.php, after the Update Password section --}}

<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="margin-top: 20px;">
    <div class="max-w-xl">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('API Tokens') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Manage your API authentication tokens. You can delete any of your existing tokens.') }}
                </p>
            </header>

            <div class="mt-6 space-y-6">
                <h3>Create New Token</h3>
                <form method="POST" action="{{ route('profile.create-token') }}">
                    @csrf
                    <div>
                        <x-input-label for="token_name" :value="__('Token Name')" />
                        <x-text-input id="token_name" name="token_name" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('token_name')" />
                    </div>
                    <div class="flex items-center gap-4 mt-4">
                        <x-primary-button>{{ __('Create Token') }}</x-primary-button>
                    </div>
                </form>

                @if (session('plain_text_token'))
                    <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
                        <p class="font-bold">Your new API Token:</p>
                        <p class="break-all">{{ session('plain_text_token') }}</p>
                        <p class="text-sm mt-2">Please copy this token now. It will not be shown again.</p>
                    </div>
                @endif

                <h3 class="mt-8">Your Existing Tokens</h3>
                @if ($user->tokens->isEmpty())
                    <p>You have no API tokens yet.</p>
                @else
                    <ul>
                        @foreach ($user->tokens as $token)
                            <li class="mt-2 flex items-center justify-between p-2 border rounded">
                                <span>{{ $token->name }} (Expires: {{ $token->expires_at ? $token->expires_at->diffForHumans() : 'Never' }})</span>
                                <form method="POST" action="{{ route('profile.delete-token', $token->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete this token?')">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    </div>
</div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
