<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('銀行帳號資訊') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("更新您帳號的銀行帳號收付款資訊。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('accountinfo.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="bank_branch" :value="__('分行代碼 bank branch')" />
            <x-text-input id="bank_branch" name="bank_branch" type="text" class="mt-1 block w-full" :value="old('bank_branch', $user->accountInfo->bank_branch)" required autofocus autocomplete="bank_branch" />
            <x-input-error class="mt-2" :messages="$errors->get('bank_branch')" />
        </div>

        <div>
            <x-input-label for="account" :value="__('帳戶 account')" />
            <x-text-input id="account" name="account" type="text" class="mt-1 block w-full" :value="old('account', $user->accountInfo->account )" required autofocus autocomplete="account" />
            <x-input-error class="mt-2" :messages="$errors->get('account')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('儲存') }}</x-primary-button>

            @if (session('status') === 'accountinfo-update')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('已儲存變更') }}</p>
            @endif
        </div>
    </form>
</section>
